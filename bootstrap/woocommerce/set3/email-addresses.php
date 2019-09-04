<?php
/**
 * Email Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-addresses.php.
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

?>
<tr>
	<td class="content_cell content_b tc">
		<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && ( $shipping = $order->get_formatted_shipping_address() ) ) : ?>
			<!--[if (mso)|(IE)]><table role="presentation" width="624" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:624px;Margin:0 auto;"><tbody><tr><td width="312" style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
			<div class="col_2">
		<?php endif; ?>
				<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td class="column_cell tc">
								<h4 class="mt_xs"><?php _e( 'Billing address', 'woocommerce' ); ?></h4>
								<p><?php echo $order->get_formatted_billing_address(); ?></p>
							</td>
						</tr>
					</tbody>
				</table>
		<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && ( $shipping = $order->get_formatted_shipping_address() ) ) : ?>
			</div>
			<!--[if (mso)|(IE)]></td><td width="312" style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
			<div class="col_2">
				<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td class="column_cell tc">
								<h4 class="mt_xs"><?php _e( 'Shipping address', 'woocommerce' ); ?></h4>
								<p><?php echo $shipping; ?></p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
		<?php endif; ?>
	</td>
</tr>
