<?php
/**
 * Customer Reset Password email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-reset-password.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

						<p class="mb_xs"><?php _e( 'Someone requested that the password be reset for the following account:', 'woocommerce' ); ?></p>
						<h3 class="mt_0 mbe"><?php printf( esc_html( $user_login ) ); ?></h3>
						<p class="tm"><?php _e( 'If this was a mistake, just ignore this email and nothing will happen.', 'woocommerce' ); ?></p>
						<p class="mb"><?php _e( 'To reset your password, visit the following address:', 'woocommerce' ); ?></p>
						<table role="presentation" class="ebtn tc" align="center"  border="0" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td class="accent_b"><a href="<?php echo esc_url( add_query_arg( array( 'key' => $reset_key, 'login' => rawurlencode( $user_login ) ), wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) ) ) ); ?>"><span><?php _e( 'Click here to reset your password', 'woocommerce' ); ?></span></a></td>
								</tr>
							</tbody>
						</table>
						<p>&nbsp; </p>
					</td>
				</tr>
			</tbody>
		</table>
	</td>
</tr>

<?php do_action( 'woocommerce_email_footer', $email ); ?>
