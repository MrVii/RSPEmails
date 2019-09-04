<?php
/**
 * Customer renewal invoice email
 *
 * @author	Brent Shepherd
 * @package WooCommerce_Subscriptions/Templates/Emails
 * @version 1.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php if ( 'pending' == $order->get_status() ) : ?>
	<p>
		<?php
		// translators: %1$s: name of the blog, %2$s: link to checkout payment url, note: no full stop due to url at the end
		echo sprintf( _x( 'An invoice has been created for you to renew your subscription with %1$s. To pay for this invoice please use the following link:', 'In customer renewal invoice email', 'woocommerce-subscriptions' ), esc_html( get_bloginfo( 'name' ) ) );
		?>
	</p>
	<table role="presentation" class="ebtn tc" align="center"  border="0" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<td class="accent_b"><a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>"><span><?php printf( esc_html__( 'Pay Now', 'woocommerce-subscriptions' ) ); ?></span></a></td>
			</tr>
		</tbody>
	</table>
	<p>&nbsp; <p>
<?php elseif ( 'failed' == $order->get_status() ) : ?>
	<p>
		<?php
		// translators: %1$s: name of the blog, %2$s: link to checkout payment url, note: no full stop due to url at the end
		echo sprintf( _x( 'The automatic payment to renew your subscription with %1$s has failed. To reactivate the subscription, please login and pay for the renewal from your account page:', 'In customer renewal invoice email', 'woocommerce-subscriptions' ), esc_html( get_bloginfo( 'name' ) ) ); ?>
	</p>
	<table role="presentation" class="ebtn tc" align="center"  border="0" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<td class="accent_b"><a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>"><span><?php printf( esc_html__( 'Pay Now', 'woocommerce-subscriptions' ) ); ?></span></a></td>
			</tr>
		</tbody>
	</table>
	<p>&nbsp; <p>
<?php endif; ?>

<?php do_action( 'woocommerce_subscriptions_email_order_details', $order, $sent_to_admin, $plain_text, $email ); ?>

<?php do_action( 'woocommerce_email_footer', $email ); ?>
