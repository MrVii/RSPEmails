<?php
/**
 * Additional Customer Details
 *
 * This is extra customer data which can be filtered by plugins. It outputs below the order item table.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-customer-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates/Emails
 * @version 2.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php if ( ! empty( $fields ) ) : ?>
	<tr>
		<td class="content_cell content_b pt pb tc">
			<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td class="column_cell tc">
							<h3 class="mt_0 tm"><?php _e( 'Customer details', 'woocommerce' ); ?></h3>
							<?php foreach ( $fields as $field ) : ?>
								<p class="mb_xs"><?php echo wp_kses_post( $field['label'] ); ?>: <?php echo wp_kses_post( $field['value'] ); ?></p>
							<?php endforeach; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
<?php endif; ?>
