<?php
/**
 * Customer booking confirmed email
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php do_action( 'woocommerce_email_header', $email_heading ); ?>

						<?php if ( $booking->get_order() ) : ?>
							<p class="mb_xs"><?php printf( __( 'Hello %s', 'woocommerce-bookings' ), ( is_callable( array( $booking->get_order(), 'get_billing_first_name' ) ) ? $booking->get_order()->get_billing_first_name() : $booking->get_order()->billing_first_name ) ); ?></p>
						<?php endif; ?>
						<p><?php _e( 'Your booking has been confirmed. The details of your booking are shown below.', 'woocommerce-bookings' ); ?></p>
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
<?php if ( $order = $booking->get_order() ) : ?>
<tr>
	<td class="content_cell content_b py tc">
		<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td class="column_cell tc">
						<?php if ( 'pending' === $order->get_status() ) : ?>
							<p class="mb_0"><?php printf( __( 'To pay for this booking please use the following link: %s', 'woocommerce-bookings' ), '<a href="' . esc_url( $order->get_checkout_payment_url() ) . '">' . __( 'Pay for booking', 'woocommerce-bookings' ) . '</a>' ); ?></p>
						<?php endif; ?>

						<?php do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text ); ?>

						<h2><?php

					$pre_wc_30 = version_compare( WC_VERSION, '3.0', '<' );
					if ( $pre_wc_30 ) {
						$order_date = $order->order_date;
					} else {
						$order_date = $order->get_date_created() ? $order->get_date_created()->date( 'Y-m-d H:i:s' ) : '';
					}

					echo __( 'Order', 'woocommerce-bookings' ) . ': ' . $order->get_order_number(); ?> (<?php printf( '<time datetime="%s">%s</time>', date_i18n( 'c', strtotime( $order_date ) ), date_i18n( wc_date_format(), strtotime( $order_date ) ) ); ?>)</h2>
					</td>
				</tr>
			</tbody>
		</table>
	</td>
</tr>
<tr>
	<td class="content_cell content_b bb py tc">
		<!--[if (mso)|(IE)]><table role="presentation" width="624" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:624px;Margin:0 auto;"><tbody><tr><td width="468" style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
		<div class="col_3 hide">
			<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td class="column_cell tl">
							<p class="mb_0 tm"><?php _e( 'Product', 'woocommerce-bookings' ); ?></p>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!--[if (mso)|(IE)]></td><td width="156" style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
		<div class="col_1 hide">
			<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td class="column_cell tr">
							<p class="mb_0 tm"><?php _e( 'Price', 'woocommerce-bookings' ); ?></p>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
	</td>
</tr>
<?php
	switch ( $order->get_status() ) {

		case "completed" :
			echo $pre_wc_30 ? $order->email_order_items_table( array( 'show_sku' => false ) ) : wc_get_email_order_items( $order, array( 'show_sku' => false ) );
			break;

		case "processing" :
		default :
			echo $pre_wc_30 ? $order->email_order_items_table( array( 'show_sku' => true ) ) : wc_get_email_order_items( $order, array( 'show_sku' => true ) );
			break;
	}
?>
<tr>
	<td class="content_cell content_b pr_0 pl_0 tr">
		<!--[if (mso)|(IE)]><table role="presentation" width="312" border="0" cellspacing="0" cellpadding="0" align="right" style="vertical-align:top;width:312px;Margin:0 0 0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
		<div class="col_2">
			<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td class="column_cell px py tr switch_tc">
							<?php
								if ( $totals = $order->get_order_item_totals() ) {
									$numItems = count($totals);
									$i = 0;
									foreach ( $totals as $total ) {
										$i++;
										if ( $i === $numItems ) {
											echo '<h2 class="mt_0 mb">'. $total['label'] .' <span class="tp">'. $total['value'] .'</span></h2>';
										}
										else {
											echo '<p class="mb_xs"><strong>'. $total['label'] .'</strong> '. $total['value'] .'</p>';
										}
									}
								}
								?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
	</td>
</tr>

<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text ); ?>

<?php do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text ); ?>

<?php endif; ?>

<?php do_action( 'woocommerce_email_footer' ); ?>
