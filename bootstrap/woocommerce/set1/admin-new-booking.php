<?php
/**
 * Admin new booking email
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( wc_booking_order_requires_confirmation( $booking->get_order() ) && $booking->get_status() == 'pending-confirmation' ) {
	$opening_paragraph = __( 'A booking has been made by %s and is awaiting your approval. The details of this booking are as follows:', 'woocommerce-bookings' );
} else {
	$opening_paragraph = __( 'A new booking has been made by %s. The details of this booking are as follows:', 'woocommerce-bookings' );
}
?>

<?php do_action( 'woocommerce_email_header', $email_heading );

$order = $booking->get_order();

if ( $order ) {
	if ( version_compare( WC_VERSION, '3.0', '<' ) ) {
		$first_name = $order->billing_first_name;
		$last_name = $order->billing_last_name;
	} else {
		$first_name = $order->get_billing_first_name();
		$last_name = $order->get_billing_last_name();
	}
}

?>
						<?php if ( ! empty( $first_name ) && ! empty( $last_name ) ) : ?>
							<p><?php printf( $opening_paragraph, $first_name . ' ' . $last_name ); ?></p>
						<?php endif; ?>
					</td>
				</tr>
			</tbody>
		</table>
	</td>
</tr>
<tr>
	<td class="content_cell content_b pb bb bt tc">
		<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td class="column_cell tl pt switch_tc">
						<p class="mb_0 tm"><strong><?php echo $booking->get_id(); ?></strong></p>
						<?php if ( $booking->get_product() ) : ?>
						<h3 class="mt_0"><strong><?php echo $booking->get_product()->get_title(); ?></strong></h3>
						<?php endif; ?>
						<p class="mb_0 tm">
							<?php
								if ( $booking->get_product() ) {
									echo $booking->get_product()->get_title();
								}
							?>
							<?php
								if ( $booking->has_resources() && ( $resource = $booking->get_resource() ) ) {
									echo '<br>';
									echo $resource->post_title;
								}
							?>
						</p>
						<p class="mb_xs"><strong><?php _e( 'Booking Start Date', 'woocommerce-bookings' ); ?></strong> <?php echo $booking->get_start_date(); ?></p>
						<p class="mb_0"><strong><?php _e( 'Booking End Date', 'woocommerce-bookings' ); ?></strong> <?php echo $booking->get_end_date(); ?></p>
						<?php if ( $booking->has_persons() ) : ?>
							<p class="mt mb_0">
							<?php
							foreach ( $booking->get_persons() as $id => $qty ) :
								if ( 0 === $qty ) {
									continue;
								}

								$person_type = ( 0 < $id ) ? get_the_title( $id ) : __( 'Person(s)', 'woocommerce-bookings' );
							?>
							<?php echo $person_type; ?> <span class="tm"><?php echo $qty; ?></span> <br/>
							<?php endforeach; ?>
						</p>
						<?php endif; ?>
					</td>
				</tr>
			</tbody>
		</table>
	</td>
</tr>
<tr>
	<td class="content_cell content_b py tc">
		<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td class="column_cell tc">
						<?php if ( wc_booking_order_requires_confirmation( $booking->get_order() ) && $booking->get_status() == 'pending-confirmation' ) : ?>
						<p><?php _e( 'This booking is awaiting your approval. Please check it and inform the customer if the date is available or not.', 'woocommerce-bookings' ); ?></p>
						<?php endif; ?>
						<table role="presentation" class="ebtn tc" align="center"  border="0" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td class="accent_b"><a href="<?php echo admin_url( 'post.php?post=' . $booking->get_id() . '&action=edit' ); ?>"><span><?php _e( 'View Booking', 'woocommerce-bookings' ); ?></span></a></td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</td>
</tr>
<?php do_action( 'woocommerce_email_footer' ); ?>
