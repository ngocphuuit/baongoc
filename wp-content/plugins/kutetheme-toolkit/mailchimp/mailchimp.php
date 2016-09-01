<?php
// Prevent loading this file directly
if ( !defined('ABSPATH')) exit;

define( 'MAILCHIMP_VER', '1.0' );
define( 'MAILCHIMP_PATH', trailingslashit( plugin_dir_path(__FILE__)) );
define( 'MAILCHIMP_URL', trailingslashit( plugin_dir_url( __FILE__ )) );
define( 'MAILCHIMP_ASSETS', trailingslashit( MAILCHIMP_URL . 'assets' ) );


/**
 * Get Mailchimp API
 *
 */
if( ! class_exists( 'MCAPI' ) ){
    require_once ( MAILCHIMP_PATH.'MCAPI.class.php' );
}


class KT_Mailchimp{
    
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;
    
    public function __construct()
    {   
        
        $this->options = get_option( 'kt_mailchimp_option' );
        
        // Add shortcode mailchimp
        add_shortcode('mailchimp', array($this, 'mailchimp_handler'));
        // Enqueue common styles and scripts
        add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
        // Add ajax for frontend
        add_action( 'wp_ajax_frontend_mailchimp', array( $this, 'frontend_mailchimp_callback') );
        add_action( 'wp_ajax_nopriv_frontend_mailchimp', array( $this, 'frontend_mailchimp_callback') );
        
        if ( !$this->options['api_key'] ) {
            add_action( 'admin_notices', array( $this, 'admin_notice' ));
        }
        
    }
    function admin_notice() {
        
        ?>
        <div class="updated">
            <p><?php 
                printf( 
                    __('Please enter Mail Chimp API Key in <a href="%s">here</a>', 'kt_mailchimp' ),
                    admin_url( 'options-general.php?page=kt-mailchimp-settings')
                ); 
            ?></p>
        </div>
        <?php
    }

    public function mailchimp_handler( $atts, $content )
    {   
        
        $atts = shortcode_atts( array(
            'title' => '',
            'style' =>'',
    		'list' => '',
    		'opt_in' => 'yes',
            'text_before' => '',
            'text_after' => '',
            'layout' => 'one',
            'height_desktop' => '',
            'height_tablet' => '',
            'height_mobile' => '',
            'css' => '',
        ), $atts );
        
        extract( $atts );
        
        $elementClass = '';
        if(function_exists('vc_shortcode_custom_css_class')){
            $elementClass = vc_shortcode_custom_css_class( $css, ' ' );
        }
        
		$this->uniqeID  = 'mailchimp-wrapper-'.uniqid();
        $this->atts = $atts;
        
        $output = '';
        $output .='<div class="block-newsletter '.$style.'">';
        $output .= '<div class="mailchimp-wrapper '.esc_attr($elementClass).'" id="'.esc_attr($this->uniqeID).'">';
        
        if($title){
            $output .= '<div class="block-heading"><h3>'.$title.'</h3></div>';
        }
        $output .= ($text_before) ? '<div class="mailchimp-before">'.$text_before.'</div>' : '';

        $height_option = '';

        if($height_desktop){
            $height_option .= '@media (min-width: 992px) {#'.$this->uniqeID.'{min-height: '.esc_attr($height_desktop).'px;}}';
        }
        if($height_tablet){
            $height_option .= '@media (min-width: 769px) {#'.$this->uniqeID.'{min-height: '.esc_attr($height_tablet).'px;}}';
        }
        if($height_mobile){
            $height_option .= '@media (max-width: 768px) {#'.$this->uniqeID.'{min-height: '.esc_attr($height_mobile).'px;}}';
        }

        if($height_option){
            $height_option = '<style>'.$height_option.'</style>';
        }

        if ( isset ( $this->options['api_key'] ) && !empty ( $this->options['api_key'] ) ) {
            
            if(!$content) 
                $content = __('Success!  Check your inbox or spam folder for a message containing a confirmation link.', 'kt_mailchimp');
            
            $output .= '<form class="mailchimp-form clearfix mailchimp-layout-'.esc_attr($layout).'" action="#" method="post">';
                $email = '<input name="email" required="" type="email" placeholder="'.__('E-mail address', 'kt_mailchimp').'"/>';
                $button = '<button class="btn btn-default mailchimp-submit" data-loading="'.__('Loading ...', 'kt_mailchimp').'" data-text="'.__('OK', 'kt_mailchimp').'"  type="submit">'.__('OK', 'kt_mailchimp').'</button>';
                if($layout == 'one'){
                    $text_repate = '<div class="input-group">%s<div class="input-group-btn">%s</div></div>'; 
                }else{
                    $text_repate = '<div class="mailchimp-input-email">%s</div><div class="mailchimp-input-button">%s</div>';
                }
                $output .= sprintf( $text_repate, $email, $button );
    			$output .= '<input type="hidden" name="action" value="signup"/>';
    			$output .= '<input type="hidden" name="list_id" value="'.$list.'"/>';
                $output .= '<input type="hidden" name="opt_in" value="'.$opt_in.'"/>';
                $output .= '<div class="mailchimp-success">'.$content.'</div>';
                $output .= '<div class="mailchimp-error"></div>';
            $output .= '</form>';
        }else{
            $output .= sprintf(
                            "Please enter your mailchimp API key in <a href='%s'>%s</a>",
                            admin_url( 'options-general.php?page=kt-mailchimp-settings'),
                             __('here', 'kutetheme')
                        );
        }
        
        $output .= ($text_after) ? '<div class="mailchimp-after">'.$text_after.'</div>' : '';
        $output .= '</div><!-- .mailchimp-wrapper -->';
        $output .='</div>';
    	return $output.$height_option;
        
    }
 
    public function wp_enqueue_scripts() {
        wp_enqueue_style( 'kt-mailchimp', MAILCHIMP_ASSETS .'style.css', array('font-awesome', 'bootstrap-css'), MAILCHIMP_VER);
        wp_enqueue_script( 'kt-mailchimp', MAILCHIMP_ASSETS . 'script.js', array('jquery'), MAILCHIMP_VER, true );
        
        wp_localize_script( 'kt-mailchimp', 'ajax_mailchimp', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'security' => wp_create_nonce( 'ajax_mailchimp' )
        ));
    }
    
    /**
     * Mailchimp callback AJAX request 
     *
     * @since 1.0
     * @return json
     */
    
    function frontend_mailchimp_callback() {
        check_ajax_referer( 'ajax_mailchimp', 'security' );
        
        $output = array( 'error'=> 1, 'msg' => __('Error', 'kt_mailchimp'));
        
        $api_key = $this->options['api_key'];
        $email = ($_POST['email']) ? $_POST['email'] : '';
        
        if ($email) {
            if(is_email($email)){
                if ( isset ( $api_key ) && !empty ( $api_key ) ) {
                    
                    $mcapi = new MCAPI($api_key);
                    $opt_in = in_array($_POST['opt_in'], array('1', 'true', 'y', 'on'));
                    
                    $mcapi->listSubscribe($_POST['list_id'], $email, null, 'html', $opt_in);
                     if($mcapi->errorCode) {
                        $output['msg'] = $mcapi->errorMessage;
                    }else{
                        $output['error'] = 0;
                    }
                }
            }else{
                $output['msg'] = __('Email address seems invalid.', 'kt_mailchimp');
            }
        }else{
            $output['msg'] = __('Email address is required field.', 'kt_mailchimp');
        }
        
        echo json_encode($output);
        die();
    }



    
    
    
}
 
$kt_mailchimp = new KT_Mailchimp();





class KT_MailChimp_Settings
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        $this->options = get_option( 'kt_mailchimp_option' );
        
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            __('KT MailChimp Settings', 'kt_mailchimp'), 
            __('KT MailChimp', 'kt_mailchimp'), 
            'manage_options', 
            'kt-mailchimp-settings', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        ?>
        <div class="wrap">  
            <h2><?php _e('Mail Chimp Settings', 'kt_mailchimp' ); ?></h2>     
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'kt_mailchimp_group' );   
                do_settings_sections( 'mailchimp-settings' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'kt_mailchimp_group', // Option group
            'kt_mailchimp_option', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            __('Settings', 'kt_mailchimp'), // Title
            array( $this, 'print_section_info' ), // Callback
            'mailchimp-settings' // Page
        );  

        add_settings_field(
            'api_key', // ID
            __('Mail Chimp API Key', 'kt_mailchimp'), // Title 
            array( $this, 'api_key_callback' ), // Callback
            'mailchimp-settings', // Page
            'setting_section_id' // Section           
        );
        
        $api_key = $this->options['api_key'];
        if ( isset ( $api_key ) && !empty ( $api_key ) ) {
            add_settings_field(
                'email_lists', // ID
                __('Email Lists', 'kt_mailchimp'), // Title 
                array( $this, 'email_lists_callback' ), // Callback
                'mailchimp-settings', // Page
                'setting_section_id' // Section           
            );
            
            add_settings_field(
                'other_option', // ID
                __('Other option', 'kt_mailchimp'), // Title 
                array( $this, 'other_option_callback' ), // Callback
                'mailchimp-settings', // Page
                'setting_section_id' // Section           
            );
        }
        
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        if( isset( $input['api_key'] ) )
            $new_input['api_key'] = sanitize_text_field( $input['api_key'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info(){}

    /** 
     * Get the settings option array and print one of its values
     */
    public function api_key_callback()
    {
        printf(
            '<input type="text" id="api_key" size="40" name="kt_mailchimp_option[api_key]" value="%s" />',
            isset( $this->options['api_key'] ) ? esc_attr( $this->options['api_key']) : ''
        );
        printf(
            '<p class="description">%s</p>',
            __('Enter your mail Chimp API key to enable a newsletter signup option with the registration form.', 'kt_mailchimp')
        );
    }
    public function email_lists_callback(){
        $api_key = $this->options['api_key'];
        if ( isset ( $api_key ) && !empty ( $api_key ) ) {
            $mcapi = new MCAPI($api_key);
        	$lists = $mcapi->lists();
            
            echo "<ul class='kt_mailchimp_lists'>";
            foreach ($lists['data'] as $key => $item) {
                printf(
                    '<li>%s<br/>%s</li>',
                    $item['name'],
                    '<input type="text" onclick="this.select()" style="font-weight:bold;text-align:left;" size="40" value="[mailchimp list='.$item['id'].']" readonly="readonly">'
                );
            }
            echo "</ul>";
            
            printf(
                '<p class="description">%s</p>',
                __('Place the short code shown below any list in a post or page to display the signup form, or use the dedicated widget.', 'kt_mailchimp')
            );
        }
    }
    
    public function other_option_callback(){
        echo "<ul class='kt_mailchimp_option'>";
        echo '<li><strong>'.__('Double Opt In', 'kt_mailchimp').'</strong> : opt_in="yes". ( EX: yes or no)</li>';
        echo '<li><strong>'.__('Layout', 'kt_mailchimp').'</strong> : opt_in="one" (EX: one, two)</li>';
        echo "</ul>";
    }
}

if( is_admin() )
    $kt_mailchimp_settings = new KT_MailChimp_Settings();



if ( class_exists( 'Vc_Manager', false ) ) {
    
    $options = get_option( 'kt_mailchimp_option' );
    $api_key = $options['api_key'];
    $lists_arr = array();
     
    if ( isset ( $api_key ) && !empty ( $api_key ) ) {
        $mcapi = new MCAPI($api_key);
    	$lists = $mcapi->lists();
        if($lists['data']){
            foreach ($lists['data'] as $item) {
                $lists_arr[$item['name']] = $item['id'];
            }
        }
    }
    
    vc_map( array(
        "name" => __( "Mailchimp", 'kt_mailchimp'),
        "base" => "mailchimp",
        "category" => __('Kute Theme', 'kt_mailchimp' ),
        "description" => __( "Mailchimp", 'kt_mailchimp'),
        "wrapper_class" => "clearfix",
        "params" => array(
			array(
                "type" => "textfield",
                "heading" => __( "Title", 'kt_mailchimp' ),
                "param_name" => "title",
                "description" => __( "Mailchimp title", 'kt_mailchimp' ),
                "admin_label" => true,
            ),
            array(
            	'type' => 'dropdown',
            	'heading' => __( 'Newsletter layout', 'kt_mailchimp' ),
            	'param_name' => 'layout',
            	'admin_label' => true,
            	'value' => array(
            		__( 'One line', 'kt_mailchimp' ) => 'one',
            		__( 'Two line', 'kt_mailchimp' ) => "two"
            	),
            	'description' => __( 'Select your layout', 'kt_mailchimp' )
            ),
            array(
                'type' => 'dropdown',
                'heading' => __( 'Display style', 'kt_mailchimp' ),
                'param_name' => 'style',
                'admin_label' => false,
                'value' => array(
                    __( 'Style 1', 'kt_mailchimp' ) => 'style1',
                    __( 'Style 2', 'kt_mailchimp' ) => "style2"
                )
            ),
            array(
            	'type' => 'dropdown',
            	'heading' => __( 'List', 'kt_mailchimp' ),
            	'param_name' => 'list',
            	'admin_label' => true,
            	'value' => $lists_arr,
            	'description' => __( 'Select your layout', 'kt_mailchimp' )
            ),
            array(
                "type" => 'checkbox',
                "heading" => __( 'Double opt-in', 'kt_mailchimp' ),
                "param_name" => 'opt_in',
                "description" => __("", 'kt_mailchimp'),
                "value" => array( __( 'Yes, please', 'js_composer' ) => 'yes' ),
            ),
            array(
              "type" => "textarea",
              "heading" => __("Text before form", 'kt_mailchimp'),
              "param_name" => "text_before",
              "description" => __("", 'kt_mailchimp')
            ),
            array(
              "type" => "textarea",
              "heading" => __("Text after form", 'kt_mailchimp'),
              "param_name" => "text_after",
              "description" => __("", 'kt_mailchimp')
            ),
            array(
              "type" => "textarea_html",
              "heading" => __("Success Message", 'kt_mailchimp'),
              "param_name" => "content",
              'value' => __('Success!  Check your inbox or spam folder for a message containing a confirmation link.', 'kt_mailchimp'), 
              "description" => __("", 'kt_mailchimp')
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", "js_composer"),
                "param_name" => "el_class",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
            ),
            array(
                "type" => "kt_heading",
                "heading" => __("Min Height option", 'kt_mailchimp'),
                "param_name" => "height_option",
            ),
            array(
                "type" => "kt_number",
                "edit_field_class" => "vc_col-sm-4 kt_margin_bottom",
                "heading" => __("On Desktop", 'kt_mailchimp'),
                "param_name" => "height_desktop",
                "step" => "1",
                'suffix' => 'px'
            ),
            array(
                "type" => "kt_number",
                "edit_field_class" => "vc_col-sm-4 kt_margin_bottom",
                "heading" => __("On Tablet", 'kt_mailchimp'),
                "param_name" => "height_tablet",
                "step" => "1",
                'suffix' => 'px'
            ),
            array(
                "type" => "kt_number",
                "edit_field_class" => "vc_col-sm-4 kt_margin_bottom",
                "heading" => __("On Mobile", 'kt_mailchimp'),
                "param_name" => "height_mobile",
                "step" => "1",
                'suffix' => 'px'
            ),
            array(
    			'type' => 'css_editor',
    			'heading' => __( 'Css', 'js_composer' ),
    			'param_name' => 'css',
    			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
    			'group' => __( 'Design options', 'js_composer' )
    		),

		)
	) );
}
/**
 * Pages widget class
 *
 * @since 1.0
 */
class Widget_KT_Mailchimp extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
                        'classname' => 'widget_kt_mailchimp', 
                        'description' => __( 'Mailchimp.', 'kutetheme' ) );
		parent::__construct('widget_kt_mailchimp', __('KT Mailchimp', 'kutetheme' ), $widget_ops);
	}

	public function widget( $args, $instance ) {
        //print_r($instance);
        echo  $args['before_widget'];
        if(class_exists('KT_Mailchimp')){
            $m = new KT_Mailchimp;
            echo  $m->mailchimp_handler($instance, $instance['content'] ? $instance['content'] : '');
        }
        echo  $args['after_widget'];
	}

	public function update( $instance, $old_instance ) {
        $new_instance = $old_instance;
        
        $title       = (isset($instance['title']) && $instance['title']) ? esc_html($instance['title']) : '';
        $list        = (isset($instance['list']) && $instance['list']) ? esc_html($instance['list']) : '';
        $opt_in      = (isset($instance['opt_in']) && $instance['opt_in']) ? 'yes' : 'no';
        $text_before = (isset($instance['text_before']) && $instance['text_before']) ? esc_html($instance['text_before']) : '';
        $text_after  = (isset($instance['text_after']) && $instance['text_after']) ? esc_html($instance['text_after']) : '';
        $content     = (isset($instance['content']) && $instance['content']) ? esc_html($instance['content']) : 'Success!  Check your inbox or spam folder for a message containing a confirmation link.';
        $layout      = (isset($instance['layout']) && $instance['layout']) ? esc_html($instance['layout']) : 'one';
        
        $height_desktop = (isset($instance['height_desktop']) && intval($instance['height_desktop']) > 0) ? intval($instance['height_desktop']) : 0;
        $height_tablet  = (isset($instance['height_tablet']) && intval($instance['height_tablet']) > 0) ? intval($instance['height_tablet']) : 0;
        $height_mobile  = (isset($instance['height_mobile']) && intval($instance['height_mobile']) > 0) ? intval($instance['height_mobile']) : 0;
        $css = (isset($instance['css']) && $instance['css']) ? esc_html($instance['css']) : '';
        
        $new_instance['title'] = $title;
        $new_instance['list'] = $list;
        $new_instance['opt_in'] = $opt_in;
        $new_instance['text_before'] = $text_before;
        $new_instance['text_after'] = $text_after;
        $new_instance['content'] = $content;
        $new_instance['layout'] = $layout;
        $new_instance['height_desktop'] = $height_desktop;
        $new_instance['height_tablet'] = $height_tablet;
        $new_instance['height_mobile'] = $height_mobile;
        $new_instance['css'] = $css;
        return $new_instance;
	}

	public function form( $instance ) {
		$title       = (isset($instance['title']) && $instance['title']) ? esc_attr($instance['title']) : '';
        $list        = (isset($instance['list']) && $instance['list']) ? esc_attr($instance['list']) : '';
        $opt_in      = (isset($instance['opt_in']) && $instance['opt_in']) ? 'yes' : 'no';
        $text_before = (isset($instance['text_before']) && $instance['text_before']) ? esc_attr($instance['text_before']) : '';
        $text_after  = (isset($instance['text_after']) && $instance['text_after']) ? esc_attr($instance['text_after']) : '';
        $content     = (isset($instance['content']) && $instance['content']) ? esc_attr($instance['content']) : 'Success!  Check your inbox or spam folder for a message containing a confirmation link.';
        $layout      = (isset($instance['layout']) && $instance['layout']) ? esc_attr($instance['layout']) : 'one';
        
        $height_desktop = (isset($instance['height_desktop']) && intval($instance['height_desktop']) > 0) ? intval($instance['height_desktop']) : 0;
        $height_tablet  = (isset($instance['height_tablet']) && intval($instance['height_tablet']) > 0) ? intval($instance['height_tablet']) : 0;
        $height_mobile  = (isset($instance['height_mobile']) && intval($instance['height_mobile']) > 0) ? intval($instance['height_mobile']) : 0;
        $css = (isset($instance['css']) && $instance['css']) ? esc_attr($instance['css']) : '';
        
        $options = get_option( 'kt_mailchimp_option' );
        $api_key = $options['api_key'];
        $html    = '<option value="0">Choose List</option>';
         
        if ( isset ( $api_key ) && !empty ( $api_key ) ) {
            $mcapi = new MCAPI($api_key);
        	$lists = $mcapi->lists();
            if($lists['data']){
                foreach ($lists['data'] as $item) {
                    $html .= '<option value="'.$item['id'].'" '.selected( $list, $item['name'] ).'>'.$item['name'].'</option>';
                }
            }
        }
	?>
    <div class="widget-content">
        <p>
            <label><?php _e('Title:', 'kutetheme'); ?></label> 
            <input class="widefat" id="<?php echo  $this->get_field_id('title'); ?>" name="<?php echo  $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        
        <p>
            <label><?php _e('Newsletter layout:', 'kutetheme'); ?></label> 
            <select class="widefat" id="<?php echo  $this->get_field_id('layout'); ?>" name="<?php echo  $this->get_field_name('layout'); ?>">
                <option value="one"<?php selected( $layout, 'one' ); ?>><?php _e('One line', 'kutetheme'); ?></option>
                <option value="two"<?php selected( $layout, 'two' ); ?>><?php _e('Two line', 'kutetheme'); ?></option>
            </select>
        </p>
        
        <p>
            <label><?php _e('List:', 'kutetheme'); ?></label> 
            <select class="widefat" id="<?php echo  $this->get_field_id('list'); ?>" name="<?php echo  $this->get_field_name('list'); ?>">
                <?php echo  $html; ?>
            </select>
        </p>
        
        <p>
            <label><?php _e('Double opt-in:', 'kutetheme'); ?></label> 
            <input <?php checked($opt_in, "yes")  ?> value="<?php _e( 'Yes, please', 'kutetheme' ) ?>" class="widefat" id="<?php echo  $this->get_field_id('opt_in'); ?>" name="<?php echo  $this->get_field_name('opt_in'); ?>" type="checkbox" />
        </p>
        
        <p>
            <label><?php _e('Text before form:', 'kutetheme'); ?></label>
            <textarea class="widefat" rows="3" id="<?php echo  $this->get_field_id('text_before'); ?>" name="<?php echo  $this->get_field_name('text_before'); ?>"><?php echo esc_textarea($text_before); ?></textarea>
        </p>
        
        <p>
            <label><?php _e('Text after form:', 'kutetheme'); ?></label>
            <textarea class="widefat" rows="3" id="<?php echo  $this->get_field_id('text_after'); ?>" name="<?php  echo  $this->get_field_name('text_after'); ?>"><?php echo esc_textarea($text_after); ?></textarea>
        </p>
        
        
        <p>
            <label><?php _e('Success Message:', 'kutetheme'); ?></label>
            <textarea class="widefat" rows="3" id="<?php echo  $this->get_field_id('content'); ?>" name="<?php echo  $this->get_field_name('content'); ?>"><?php echo esc_textarea($content); ?></textarea>
        </p>
        
        <p>
            <label><?php _e('Extra class name:', 'kutetheme'); ?></label> 
            <input class="widefat" id="<?php echo  $this->get_field_id('css'); ?>" name="<?php echo  $this->get_field_name('css'); ?>" type="text" value="<?php echo esc_attr( $css ); ?>" />
        </p>
        <p>
            <label><?php _e('Min Height On Desktop:', 'kutetheme'); ?></label> 
            <input class="widefat" id="<?php echo  $this->get_field_id('height_desktop'); ?>" name="<?php echo  $this->get_field_name('height_desktop'); ?>" type="text" value="<?php echo esc_attr( $height_desktop ); ?>" />
        </p>
        
        <p>
            <label><?php _e('Min Height On Tablet:', 'kutetheme'); ?></label> 
            <input class="widefat" id="<?php echo  $this->get_field_id('height_tablet'); ?>" name="<?php echo  $this->get_field_name('height_tablet'); ?>" type="text" value="<?php echo esc_attr( $height_tablet ); ?>" />
        </p>
        
        <p>
            <label><?php _e('Min Height On Mobile:', 'kutetheme'); ?></label> 
            <input class="widefat" id="<?php echo  $this->get_field_id('height_mobile'); ?>" name="<?php echo  $this->get_field_name('height_mobile'); ?>" type="text" value="<?php echo esc_attr( $height_mobile ); ?>" />
        </p>
        
    </div>
    <?php
	}

}
add_action( 'widgets_init', function(){
    register_widget( 'Widget_KT_Mailchimp' );
} );

