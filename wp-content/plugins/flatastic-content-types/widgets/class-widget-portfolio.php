<?php
/**
 * List portfolio. One widget to rule them all.
 *
 * @category 	Widgets

 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Mad_Widget_Portfolio extends WP_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {

		$this->widget_cssclass    = 'mad_widget_portfolio';
		$this->widget_description = __( 'Display a list of your portfolio on your site.', 'mad_app_textdomain' );
		$this->widget_id          = 'mad_widget_portfolio';
		$this->widget_name        = __( 'FLATASTIC Widget Portfolio', 'mad_app_textdomain' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => __( 'Portfolio', 'mad_app_textdomain' ),
				'label' => __( 'Title', 'mad_app_textdomain' )
			),
			'number' => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 3,
				'label' => __( 'Number of products to show', 'mad_app_textdomain' )
			),
			'orderby' => array(
				'type'  => 'select',
				'std'   => 'date',
				'label' => __( 'Order by', 'mad_app_textdomain' ),
				'options' => $this->get_order_sort_array()
			),
			'order' => array(
				'type'  => 'select',
				'std'   => 'desc',
				'label' => _x( 'Order', 'Sorting order', 'mad_app_textdomain' ),
				'options' => array(
					'asc'  => __( 'ASC', 'mad_app_textdomain' ),
					'desc' => __( 'DESC', 'mad_app_textdomain' ),
				)
			)
		);

		$widget_ops = array(
			'classname'   => $this->widget_cssclass,
			'description' => $this->widget_description
		);

		parent::__construct( $this->widget_id, $this->widget_name, $widget_ops );

	}

	public function widget( $args, $instance ) {

		ob_start();
		extract( $args );

		$output		 = '';
		$title       = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$number      = absint( $instance['number'] );
		$orderby     = sanitize_title( $instance['orderby'] );
		$order       = sanitize_title( $instance['order'] );

    	$query_args = array(
    		'posts_per_page' => $number,
    		'post_status' 	 => 'publish',
    		'post_type' 	 => 'portfolio',
    		'no_found_rows'  => 1,
			'orderby'		 => $orderby,
    		'order'          => $order == 'asc' ? 'asc' : 'desc'
    	);

		$r = new WP_Query( $query_args );

		if ( $r->have_posts() ) {

			echo $before_widget;

			if ( $title )
				echo $before_title . $title . $after_title;

			echo "<ul class='portfolio-widget-list'>";

				while ( $r->have_posts()) { $r->the_post();
					?>
					<li class="thumbnails-entry">
						<?php
							if (has_post_thumbnail()) {
								$output = '<a class="entry-thumb-image" href="'. esc_url( get_permalink( get_the_ID() ) ) . '" title="' . esc_attr( get_the_title() ) . '">';
								$output .= MAD_THEME_HELPER::get_the_post_thumbnail(get_the_ID(), '60*60', array('title' => esc_attr( get_the_title() ), 'alt' => esc_attr( get_the_title() )));
								$output .= '</a>';
							}

							// title
							$output .= '<div class="entry-post-holder">';
							$output .= '<a href="' . esc_url(get_permalink( get_the_ID() )) . '"><h6 class="entry-post-title">'. get_the_title() . '</h6></a>';
							$output .= '<span class="entry-post-date">' . get_the_time(get_option('date_format'), get_the_ID() ) . '</span>';
							$output .= '</div><div class="clear"></div>';

							echo $output;
						?>
					</li>
					<?php
				}

			echo '</ul>';

			echo $after_widget;
		}

		wp_reset_postdata();

		echo ob_get_clean();
	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		if ( ! $this->settings ) {
			return $instance;
		}

		foreach ( $this->settings as $key => $setting ) {

			if ( isset( $new_instance[ $key ] ) ) {
				$instance[ $key ] = sanitize_text_field( $new_instance[ $key ] );
			} elseif ( 'checkbox' === $setting['type'] ) {
				$instance[ $key ] = 0;
			}
		}

		return $instance;
	}

	public function form( $instance ) {

		if ( !$this->settings ) {
			return;
		}

		foreach ( $this->settings as $key => $setting ) {

			$value   = isset( $instance[ $key ] ) ? $instance[ $key ] : $setting['std'];

			switch ( $setting['type'] ) {
				case "text" :
					?>
					<p>
						<label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $setting['label']; ?></label>
						<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>" name="<?php echo $this->get_field_name( $key ); ?>" type="text" value="<?php echo esc_attr( $value ); ?>" />
					</p>
					<?php
					break;
				case "number" :
					?>
					<p>
						<label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $setting['label']; ?></label>
						<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>" name="<?php echo $this->get_field_name( $key ); ?>" type="number" step="<?php echo esc_attr( $setting['step'] ); ?>" min="<?php echo esc_attr( $setting['min'] ); ?>" max="<?php echo esc_attr( $setting['max'] ); ?>" value="<?php echo esc_attr( $value ); ?>" />
					</p>
					<?php
					break;
				case "select" :
					?>
					<p>
						<label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $setting['label']; ?></label>
						<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>" name="<?php echo $this->get_field_name( $key ); ?>">
							<?php foreach ( $setting['options'] as $option_key => $option_value ) : ?>
								<option value="<?php echo esc_attr( $option_key ); ?>" <?php selected( $option_key, $value ); ?>><?php echo esc_html( $option_value ); ?></option>
							<?php endforeach; ?>
						</select>
					</p>
					<?php
					break;
				case "checkbox" :
					?>
					<p>
						<input id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $key ) ); ?>" type="checkbox" value="1" <?php checked( $value, 1 ); ?> />
						<label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $setting['label']; ?></label>
					</p>
					<?php
					break;
			}
		}
	}

	public static function get_order_sort_array() {
		return array('ID' => 'ID', 'date' => 'date', 'post_date' => 'post_date', 'title' => 'title',
			'post_title' => 'post_title', 'name' => 'name', 'post_name' => 'post_name', 'modified' => 'modified',
			'post_modified' => 'post_modified', 'modified_gmt' => 'modified_gmt', 'post_modified_gmt' => 'post_modified_gmt',
			'menu_order' => 'menu_order', 'parent' => 'parent', 'post_parent' => 'post_parent',
			'rand' => 'rand', 'comment_count' => 'comment_count', 'author' => 'author', 'post_author' => 'post_author');
	}

}
