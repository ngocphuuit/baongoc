<?php
/**
 * CMB2 Theme Options
 * @version 0.1.0
 */
class KT_Admin {
	/**
 	 * Option key, and option page slug
 	 * @var string
 	 */
	private $key = 'kt_options';
	/**
 	 * Options page metabox id
 	 * @var string
 	 */
	private $metabox_id = 'kt_option_metabox';
	/**
	 * Options Page title
	 * @var string
	 */
	protected $title = '';
	/**
	 * Options Page hook
	 * @var string
	 */
	protected $options_page = '';
	/**
	 * Constructor
	 * @since 0.1.0
	 */
    private $config = array();
    
	public function __construct() {
		// Set our title
		$this->title = __( 'Theme Options', 'kutetheme' );

        $config_file = kt_get_file_config( 'theme-option' );
        if ( $config_file ) {
            $this->config = include( $config_file );
        }
	}
	/**
	 * Initiate our hooks
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'cmb2_init', array( $this, 'add_options_page_metabox' ) );
	}
	/**
	 * Register our setting to WP
	 * @since  0.1.0
	 */
	public function init() {
		register_setting( $this->key, $this->key );
	}
	/**
	 * Add menu options page
	 * @since 0.1.0
	 */
	public function add_options_page() {
		$this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
		// Include CMB CSS in the head to avoid FOUT
		add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
        
        add_action( 'admin_enqueue_scripts', array( $this, 'kt_admin_styles' ) );
	}
    function kt_admin_styles() {
        wp_register_style( 'add_stylesheet', KUTETHEME_PLUGIN_URL . '/cmb2/css/style.css' );
        wp_enqueue_style( 'add_stylesheet' );
        wp_enqueue_script( 'kt-theme-option-js', KUTETHEME_PLUGIN_URL . '/cmb2/js/custom.js', array( 'jquery' ), '1.0', true );
    }
    /**
     * Get all meta boxes that added for page options
     * @since 1.0.0
     * @return array
     */
    function get_option_boxes(){
        $boxes = CMB2_Boxes::get_all();
        $options_boxes = array();
        foreach ( $boxes  as $k => $mb ) {
            $object = $mb->mb_object_type();
            $is_true =  false;
            if ( is_array( $object ) ){
                if ( in_array( 'options-page', $object ) ) {
                    $is_true = true;
                }
            } else {
                if ( $object == 'options-page' ) {
                    $is_true = true;
                }
            }
            if ( $is_true ) {
                $is_true = false;
                if(  isset( $mb->meta_box['show_on'] ) ){
                    if(  is_string( $mb->meta_box['show_on']['value'] ) ){
                        $is_true = $mb->meta_box['show_on']['value'] == $this->key;
                    } else if ( is_array( $mb->meta_box['show_on']['value'] ) ) {
                        $is_true = in_array( $this->key, $mb->meta_box['show_on']['value'] ) ;
                    }
                }
            }
            if ( $is_true ) {
                $options_boxes[ $k ] =  $mb;
            }
        }
        return $options_boxes;
    }
    
    /**
     * Get current option page link
     *
     * @return string
     */
    function page_link(){
        return admin_url( 'admin.php?page='.$this->key );
    }
    
	/**
     * Admin page markup. Mostly handled by CMB2
     * @since  0.1.0
     */
    public function admin_page_display() {
        $link   = $this->page_link();
        $boxes  = $this->get_option_boxes();
        $config = $this->config;
        
        $wrap =  isset( $_GET['wrap'] ) ? sanitize_key( $_GET['wrap'] ) : key( $config );
        
        if ( ! isset( $config[ $wrap ] ) ) {
            reset( $config );
            $wrap  = key( $config );
        }
        
        if( isset( $config[$wrap]['cmb'] ) ){
            //Has child
            $tab =  isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : key( $config[$wrap]['cmb'] );
            if ( ! isset( $config[$wrap]['cmb'][ $tab ] ) ) {
                reset( $boxes );
                $tab  = key( $config[$wrap]['cmb'] );
            }
        }else{
            $tab = $wrap;
        }
        ?>
        <div class="container-option">
            <div class="wrapper cmb2-options-page <?php echo esc_attr( $this->key ); ?> <?php echo esc_attr( $tab ) ?> <?php echo esc_attr( $wrap ) ?>">
                <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
                <div class="kt-box-menu">
                    <div class="kt_sidebar">
                        <ul class="kt_group_menu">
                            <?php foreach( $config as $k => $c ) : ?>
                                <?php if( isset( $c['type'] ) && $c['type'] == 'wrapper' ): ?>
                                    <li class="kt_item_menu has_child <?php echo  $wrap == $k ? 'menu-item-active show-submenu' : ''; ?>">
                                        <a href="<?php echo  add_query_arg( array( 'wrap' => esc_attr( $k ) ), esc_url($link) ) ?>"><?php echo $c['title']; ?></a>
                                        <span class="arow"></span>
                                        <ul class="kt_menu">
                                            <?php foreach( $c['cmb'] as $cmb ): ?>
                                                 <li class="kt_item_menu kt_chil_item <?php echo  $tab == $cmb['setting']['id'] ? 'active' : ''; ?>"><a href="<?php echo  add_query_arg( array( 'wrap' => esc_attr( $k ), 'tab' => esc_attr( $cmb['setting']['id'] ) ), esc_url($link) ) ?>"><?php echo esc_attr( $cmb['setting']['title'] ); ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php else: //Single ?>
                                    <li class="kt_item_menu only_item <?php echo  $wrap == $k ? 'menu-item-active' : ''; ?>">
                                        <a href="<?php echo  add_query_arg( array( 'wrap' => esc_attr( $k ) ), esc_url($link) ) ?>"><?php echo $c['setting']['title']; ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="content-page-option">
                        <div class="content-tab">
                            <?php  if ( isset( $config[$wrap]['cmb'] ) && count( $config[$wrap]['cmb'] ) > 1 ) : ?>
                                <h2 class="nav-tab-wrapper">
                                    <?php foreach ( $config[$wrap]['cmb'] as $k => $t ) : ?>
                                        <a href="<?php echo  add_query_arg( array( 'wrap' => esc_attr( $wrap ), 'tab' => esc_attr( $k ) ), esc_url($link) ) ?>" class="nav-tab <?php echo  $tab == $k ? 'nav-tab-active' : ''; ?>"><?php echo esc_html( $t['setting']['title'] ) ; ?></a>
                                    <?php endforeach; ?>
                                </h2>
                            <?php endif; ?>
                            <?php cmb2_metabox_form( $tab , $this->key, array( 'cmb_styles' => false ) ); ?>
                        </div>
                        <div class="bg-color-menu"></div>
                    </div>
                </div><!--kt-box-menu-->
            </div>
        </div>
    <?php
    }
	/**
	 * Add the options metabox to the array of metaboxes
	 * @since  0.1.0
	 */
	function add_options_page_metabox() {
        foreach( $this->config as $c ){
            if( isset( $c['type'] ) && $c['type'] == 'wrapper' ){
                // has child page
                foreach( $c['cmb'] as $cmb ){
                    $cmb_options = new_cmb2_box( $cmb['setting'] );
                    
                    foreach( $cmb['fields'] as $field ){
                        $cmb_options->add_field($field);
                    }
                }
            }else{
                //Single page
                $cmb_options = new_cmb2_box( $c['setting'] );
                    
                foreach( $c['fields'] as $field ) {
                    $cmb_options->add_field($field);
                }
            }
            
        }
	}
	/**
	 * Public getter method for retrieving protected/private variables
	 * @since  0.1.0
	 * @param  string  $field Field to retrieve
	 * @return mixed          Field value or exception is thrown
	 */
	public function __get( $field ) {
		// Allowed fields to retrieve
		if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
			return $this->{$field};
		}
		throw new Exception( 'Invalid property: ' . $field );
	}
}
/**
 * Helper function to get/return the KT_Admin object
 * @since  0.1.0
 * @return KT_Admin object
 */
function kt_admin() {
	static $object = null;
	if ( is_null( $object ) ) {
		$object = new KT_Admin();
		$object->hooks();
	}
	return $object;
}
/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function kt_get_option( $key = '' ) {
	return cmb2_get_option( kt_admin()->key, $key );
}
// Get it started
kt_admin();