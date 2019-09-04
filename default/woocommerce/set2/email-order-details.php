<?php
/**
 * Order details table shown in emails.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$text_align = is_rtl() ? 'right' : 'left';

if(isset($order_type) == false ) {
	$order_type = 'order';
}

do_action( 'woocommerce_email_before_'. $order_type . '_table', $order, $sent_to_admin, $plain_text, $email );

$link_element_url = ( $order_type != 'order' ) ? wcs_get_edit_post_link( wcs_get_objects_property( $order, 'id' ) ) : $order->get_view_order_url();

?>
						<?php if ( 'cancelled_subscription' != $email->id ) : ?>
							<?php if ( 'order' == $order_type ) : ?>

								<?php if ( $sent_to_admin ) : ?>
									<table role="presentation" class="ebtn tc" align="center"  border="0" cellspacing="0" cellpadding="0">
										<tbody>
											<tr>
												<td class="accent_b sc"><a href="<?php echo esc_url( $link_element_url ); ?>"><span><?php printf( __( 'Order #%s', 'Used in email notification', 'woocommerce'), $order->get_order_number() ); ?> <small style="white-space: nowrap;">(<?php printf( '<time datetime="%s">%s</time>', $order->get_date_created()->format( 'c' ), wc_format_datetime( $order->get_date_created() ) ); ?>)</small></span></a></td>
											</tr>
										</tbody>
									</table>
								<?php else : ?>
									<h2><?php printf( __( 'Order #%s', 'Used in email notification', 'woocommerce' ), $order->get_order_number() ); ?></h2>
								<?php endif; ?>

							<?php else : ?>

								<?php if ( $sent_to_admin ) : ?>
									<table role="presentation" class="ebtn tc" align="center"  border="0" cellspacing="0" cellpadding="0">
										<tbody>
											<tr>
												<td class="accent_b sc"><a href="<?php echo esc_url( $link_element_url ); ?>"><span><?php printf( __( 'Subscription #%s', 'Used in email notification', 'woocommerce'), $order->get_order_number() ); ?> <small style="white-space: nowrap;">(<?php printf( '<time datetime="%s">%s</time>', $order->get_date_created()->format( 'c' ), wc_format_datetime( $order->get_date_created() ) ); ?>)</small></span></a></td>
											</tr>
										</tbody>
									</table>
								<?php else : ?>
									<h2><?php printf( __( 'Subscription #%s', 'Used in email notification', 'woocommerce' ), $order->get_order_number() ); ?></h2>
								<?php endif; ?>

							<?php endif; ?>
						<?php endif; ?>
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
							<p class="mb_0 tm"><?php _e( 'Product', 'woocommerce' ); ?></p>
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
							<p class="mb_0 tm"><?php _e( 'Price', 'woocommerce' ); ?></p>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
	</td>
</tr>
<?php if ( 'order' == $order_type ) : ?>
	<?php echo wc_get_email_order_items( $order, array(
		'show_sku'      => $sent_to_admin,
		'show_image'    => true,
		'image_size'    => array( 140, 140 ),
		'plain_text'    => $plain_text,
		'sent_to_admin' => $sent_to_admin,
	) ); ?>
<?php else : ?>
	<?php echo wp_kses_post( WC_Subscriptions_Email::email_order_items_table( $order, $order_items_table_args ) ); ?>
<?php endif; ?>
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
<?php do_action( 'woocommerce_email_after_'. $order_type . '_table', $order, $sent_to_admin, $plain_text, $email ); ?>
