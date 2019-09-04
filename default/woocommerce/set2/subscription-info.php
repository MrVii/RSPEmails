<?php
/**
 * Subscription information template
 *
 * @author	Brent Shepherd / Chuck Mac
 * @package WooCommerce_Subscriptions/Templates/Emails
 * @version 1.5
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php if ( ! empty( $subscriptions ) ) : ?>
	<tr>
		<td class="content_cell content_b pte tc">
			<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td class="column_cell py tc">
							<h2><?php esc_html_e( 'Subscription Information:', 'woocommerce-subscriptions' ); ?></h2>
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
								<p class="mb_0 tm"><?php esc_html_e( 'Subscription', 'woocommerce-subscriptions' ); ?></p>
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
								<p class="mb_0 tm"><?php echo esc_html_x( 'Price',  'table heading', 'woocommerce-subscriptions' ); ?></p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
		</td>
	</tr>
	<?php foreach ( $subscriptions as $subscription ) : ?>
	<tr>
		<td class="content_cell content_b pb bb tc">
			<!--[if (mso)|(IE)]><table role="presentation" width="624" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:624px;Margin:0 auto;"><tbody><tr><![endif]-->
				<!--[if (mso)|(IE)]></td><td width="468" style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
				<div class="col_3">
					<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
						<tbody>
							<tr>
								<td class="column_cell tl switch_tc">
									<h3><a href="<?php echo esc_url( ( $is_admin_email ) ? wcs_get_edit_post_link( $subscription->get_id() ) : $subscription->get_view_order_url() ); ?>"><span><?php echo sprintf( esc_html_x( '#%s', 'subscription number in email table. (eg: #106)', 'woocommerce-subscriptions' ), esc_html( $subscription->get_order_number() ) ); ?></span></a></h3>
									<p class="mb_xs"><strong><?php echo esc_html_x( 'Start Date', 'table heading',  'woocommerce-subscriptions' ); ?>:</strong> <?php echo esc_html( date_i18n( wc_date_format(), $subscription->get_time( 'date_created', 'site' ) ) ); ?></p>
									<p class="mb_xs"><strong><?php echo esc_html_x( 'End Date', 'table heading',  'woocommerce-subscriptions' ); ?>:</strong> <?php echo esc_html( ( 0 < $subscription->get_time( 'end' ) ) ? date_i18n( wc_date_format(), $subscription->get_time( 'end', 'site' ) ) : _x( 'When Cancelled', 'Used as end date for an indefinite subscription', 'woocommerce-subscriptions' ) ); ?></p>
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
									<p class="mb_0"><?php echo wp_kses_post( $subscription->get_formatted_order_total() ); ?></p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
		</td>
	</tr>
	<?php endforeach; ?>
<?php endif; ?>
