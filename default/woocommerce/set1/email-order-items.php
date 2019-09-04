<?php
/**
 * Email Order Items
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-items.php.
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

foreach ( $items as $item_id => $item ) :
	if ( apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
		$product = $item->get_product();
		?>
		<tr>
		<?php if ( $show_image ) : ?>
			<td class="content_cell content_b py bb tc">
				<!--[if (mso)|(IE)]><table role="presentation" width="624" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:624px;Margin:0 auto;"><tbody><tr><![endif]-->
					<!--[if (mso)|(IE)]><td width="156" style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="col_1">
						<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td class="column_cell tc">
										<p class="mb_0 imgr"><?php echo apply_filters( 'woocommerce_order_item_thumbnail', '<img src="' . ( $product->get_image_id() ? current( wp_get_attachment_image_src( $product->get_image_id(), 'thumbnail' ) ) : wc_placeholder_img_src() ) . '" alt="' . esc_attr__( 'Product image', 'woocommerce' ) . '" height="' . esc_attr( $image_size[1] ) . '" width="' . esc_attr( $image_size[0] ) . '" style="max-width:' . esc_attr( $image_size[0] ) . 'px;" />', $item ); ?></p>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--[if (mso)|(IE)]></td><td width="312" style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="col_2">
		<?php else : ?>
			<td class="content_cell content_b pb bb tc">
				<!--[if (mso)|(IE)]><table role="presentation" width="624" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:624px;Margin:0 auto;"><tbody><tr><![endif]-->
					<!--[if (mso)|(IE)]></td><td width="468" style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="col_3">
		<?php endif;?>
					<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
						<tbody>
							<tr>
								<td class="column_cell tl switch_tc">
									<h3><?php echo apply_filters( 'woocommerce_order_item_name', $item->get_name(), $item, false ) . '<span class="tm"> × ' . apply_filters( 'woocommerce_email_order_item_quantity', $item->get_quantity(), $item ) . '</span>'; ?></h3>
									<?php // SKU
										if ( $show_sku && is_object( $product ) && $product->get_sku() ) {
											echo '<p class="mb_xs tm">#' . $product->get_sku() . '</p>';
										}

										// allow other plugins to add additional product information here
										do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $order, $plain_text );

										wc_display_item_meta( $item );

										if ( $show_download_links ) {
											wc_display_item_downloads( $item );
										}

										// allow other plugins to add additional product information here
										do_action( 'woocommerce_order_item_meta_end', $item_id, $item, $order, $plain_text );

									?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!--[if (mso)|(IE)]></td><td width="156" style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
				<div class="col_1">
					<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
						<tbody>
							<tr>
								<td class="column_cell py tr switch_tc">
									<p class="mb_0"><?php echo $order->get_formatted_line_subtotal( $item ); ?></p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
				<?php if ( $show_purchase_note && is_object( $product ) && ( $purchase_note = $product->get_purchase_note() ) ) : ?>
				<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td class="column_cell pt tr switch_tc">
								<?php echo wpautop( do_shortcode( wp_kses_post( $purchase_note ) ) ); ?>
							</td>
						</tr>
					</tbody>
				</table>
				<?php endif; ?>
			</td>
		</tr>
<?php }
endforeach; ?>
