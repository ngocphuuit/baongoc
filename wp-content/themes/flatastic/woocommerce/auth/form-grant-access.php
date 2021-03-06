<?php
/**
 * Auth form grant access
 *
 * @author  WooThemes
 * @package WooCommerce/Templates/Auth
 * @version 2.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php do_action( 'woocommerce_auth_page_header' ); ?>

<h1><?php printf( __( '%s would like to connect to your store' , 'flatastic' ), esc_html( $app_name ) ); ?></h1>

<?php wc_print_notices(); ?>

<p><?php printf( __( 'This will give "%s" <strong>%s</strong> access which will allow it to:' , 'flatastic' ), esc_html( $app_name ), esc_html( $scope ) ); ?></p>

<ul class="wc-auth-permissions">
	<?php foreach ( $permissions as $permission ) : ?>
		<li><?php echo esc_html( $permission ); ?></li>
	<?php endforeach; ?>
</ul>

<div class="wc-auth-logged-in-as">
	<?php echo get_avatar( $user->ID, 70 ); ?>
	<p><?php printf( __( 'Logged in as %s', 'flatastic' ), esc_html( $user->display_name ) ); ?> <a href="<?php echo esc_url( $logout_url ); ?>" class="wc-auth-logout"><?php _e( 'Logout', 'flatastic' ); ?></a>
</div>

<p class="wc-auth-actions">
	<a href="<?php echo esc_url( $granted_url ); ?>" class="button button-primary wc-auth-approve"><?php _e( 'Approve', 'flatastic' ); ?></a>
	<a href="<?php echo esc_url( $return_url ); ?>" class="button wc-auth-deny"><?php _e( 'Deny', 'flatastic' ); ?></a>
</p>

<?php do_action( 'woocommerce_auth_page_footer' ); ?>
