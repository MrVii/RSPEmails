<?php
/**
 * Admin booking cancelled email
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php do_action( 'woocommerce_email_header', $email_heading ); ?>

						<p>
							<?php _e( 'The following booking has been cancelled. The details of the cancelled booking can be found below.', 'woocommerce-bookings' ); ?>
						</p>
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
