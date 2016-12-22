<?php

/**
 * oEmbed field class.
 */
class MAD_OEmbed_Field extends MAD_Text_Field {

	/**
	 * Enqueue scripts and styles
	 */
	public static function admin_enqueue_scripts() {
		wp_enqueue_style( 'mad-oembed', MAD_CSS_URL . 'oembed.css' );
		wp_enqueue_script( 'mad-oembed', MAD_JS_URL . 'oembed.js', array(), MAD_VER, true );
	}

	/**
	 * Add actions
	 */
	public static function add_actions() {
		add_action( 'wp_ajax_mad_get_embed', array( __CLASS__, 'wp_ajax_get_embed' ) );
	}

	/**
	 * Ajax callback for returning oEmbed HTML
	 */
	public static function wp_ajax_get_embed() {
		$url = (string) filter_input( INPUT_POST, 'url', FILTER_SANITIZE_URL );
		wp_send_json_success( self::get_embed( $url ) );
	}

	/**
	 * Get embed html from url
	 *
	 * @param string $url
	 * @return string
	 */
	public static function get_embed( $url ) {
		/**
		 * Set arguments for getting embeded HTML.
		 * Without arguments, default width will be taken from global $content_width, which can break UI in the admin
		 *
		 * @link https://github.com/rilwis/meta-box/issues/801
		 * @see  WP_oEmbed::fetch()
		 * @see  WP_Embed::shortcode()
		 * @see  wp_embed_defaults()
		 */
		$args = array();
		if ( is_admin() ) {
			$args['width'] = 360;
		}

		// Try oembed first
		$embed = wp_oembed_get( $url, $args );

		// If no oembed provides found, try WordPress auto embed
		if ( ! $embed ) {
			$embed = $GLOBALS['wp_embed']->shortcode( $args, $url );
		}

		return $embed ? $embed : esc_html__( 'Embed HTML not available.', 'flatastic' );
	}

	/**
	 * Get field HTML
	 *
	 * @param mixed $meta
	 * @param array $field
	 * @return string
	 */
	public static function html( $meta, $field ) {
		return parent::html( $meta, $field ) . sprintf(
			'<a href="#" class="mad-embed-show button">%s</a>
			<span class="spinner"></span>
			<div class="mad-embed-media">%s</div>',
			esc_html__( 'Preview', 'flatastic' ),
			$meta ? self::get_embed( $meta ) : ''
		);
	}

	/**
	 * Get the attributes for a field
	 *
	 * @param array $field
	 * @param mixed $value
	 *
	 * @return array
	 */
	public static function get_attributes( $field, $value = null ) {
		$attributes = parent::get_attributes( $field, $value );
		$attributes['type'] = 'url';
		return $attributes;
	}

	/**
	 * Format a single value for the helper functions.
	 *
	 * @param array  $field Field parameter
	 * @param string $value The value
	 * @return string
	 */
	public static function format_single_value( $field, $value ) {
		return self::get_embed( $value );
	}
}
