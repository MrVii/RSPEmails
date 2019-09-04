<?php
/**
 * Customer payment retry email
 *
 * @author	Prospress
 * @package WooCommerce_Subscriptions/Templates/Emails
 * @version 2.1
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<p>
	<?php
	// translators: %1$s: name of the blog, %2$s: lowercase human time diff in the form returned by wcs_get_human_time_diff(), e.g. 'in 12 hours'
	echo sprintf( _x( 'The automatic payment to renew your subscription with %1$s has failed. We will retry the payment %2$s.', 'In customer renewal invoice email', 'woocommerce-subscriptions' ), esc_html( get_bloginfo( 'name' ) ), strtolower( wcs_get_human_time_diff( $retry->get_time() ) ) ) );
	?>
</p>
<p>
	<?php
	// translators: %1$s %2$s: link markup to checkout payment url, note: no full stop due to url at the end
	echo sprintf( _x( 'To reactivate the subscription now, you can also login and pay for the renewal from your account page:', 'In customer renewal invoice email', 'woocommerce-subscriptions' ) );
	?>
</p>
<table role="presentation" class="ebtn tc" align="center"  border="0" cellspacing="0" cellpadding="0">
	<tbody>
		<tr>
			<td class="accent_b"><a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>"><span><?php printf( esc_html__( 'Pay Now', 'In customer renewal invoice email', 'woocommerce-subscriptions' ) ); ?></span></a></td>
		</tr>
	</tbody>
</table>
<p>&nbsp; <p>

<?php do_action( 'woocommerce_subscriptions_email_order_details', $order, $sent_to_admin, $plain_text, $email ); ?>

<?php do_action( 'woocommerce_email_footer', $email );
