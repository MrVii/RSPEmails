<?php
/**
 * Cancelled Subscription email
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
						<p class="mb_xs">
							<?php
							// translators: $1: customer's billing first name and last name
							printf( esc_html__( 'A subscription belonging to %1$s has expired. Their subscription\'s details are as follows:', 'woocommerce-subscriptions' ), esc_html( $subscription->get_formatted_billing_full_name() ) );
							?>
						</p>
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
							<p class="mb_0 tm"><?php echo esc_html_x( 'Price',  'table headings in notification email', 'woocommerce-subscriptions' ); ?></p>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
	</td>
</tr>
<tr>
	<td class="content_cell content_b pb bb tc">
		<!--[if (mso)|(IE)]><table role="presentation" width="624" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:624px;Margin:0 auto;"><tbody><tr><![endif]-->
			<!--[if (mso)|(IE)]></td><td width="468" style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
			<div class="col_3">
				<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td class="column_cell tl switch_tc">
								<h3><a href="<?php echo esc_url( wcs_get_edit_post_link( $subscription->get_id() ) ); ?>"><span>#<?php echo esc_html( $subscription->get_order_number() ); ?></span></a></h3>
								<?php
								$last_order_time_created = $subscription->get_time( 'last_order_date_created', 'site' );
								if ( ! empty( $last_order_time_created ) ) : ?>
									<p class="mb_xs"><strong><?php echo esc_html_x( 'Last Order Date', 'table heading', 'woocommerce-subscriptions' ); ?>:</strong> <?php echo esc_html( date_i18n( wc_date_format(), $last_order_time_created ) ); ?></p>
								<?php endif; ?>
								<p class="mb_xs"><strong><?php echo esc_html_x( 'End Date', 'table headings in notification email',  'woocommerce-subscriptions' ); ?>:</strong> <?php echo esc_html( date_i18n( wc_date_format(), $subscription->get_time( 'end', 'site' ) ) ); ?></p>
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
<?php do_action( 'woocommerce_subscriptions_email_order_details', $subscription, $sent_to_admin, $plain_text, $email ); ?>

<?php do_action( 'woocommerce_email_customer_details', $subscription, $sent_to_admin, $plain_text, $email ); ?>

<?php do_action( 'woocommerce_email_footer', $email ); ?>
