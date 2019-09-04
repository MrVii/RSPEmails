<?php
/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-new-account.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

						<p class="mb_xs"><?php printf( __( 'Thanks for creating an account on %1$s. Your username is', 'woocommerce' ), esc_html( $blogname ) ); ?></p>
						<h3 class="mt_0 mbe"><?php printf( esc_html( $user_login ) ); ?></h3>

					<?php if ( 'yes' === get_option( 'woocommerce_registration_generate_password' ) && $password_generated ) : ?>

						<p class="mb_xs"><?php printf( __( 'Your password has been automatically generated:', 'woocommerce' ) ); ?></p>
						<h3 class="mt_0 mbe"><?php printf( esc_html( $user_pass ) ); ?></h3>

					<?php endif; ?>
						<p class="mb"><?php printf( __( 'You can access your account area to view your orders and change your password here:', 'woocommerce' ) ); ?></p>
						<table role="presentation" class="ebtn tc" align="center"  border="0" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td class="accent_b"><a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>"><span><?php printf(  __( 'Access Account', 'woocommerce' ) ); ?></span></a></td>
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
<?php do_action( 'woocommerce_email_footer', $email );
