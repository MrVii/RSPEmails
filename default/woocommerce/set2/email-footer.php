<?php
/**
 * Email Footer
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-footer.php.
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
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$theme_path           = get_stylesheet_directory_uri().'/woocommerce/emails/images'; // images folder
$email_facebook_url   = ""; // Facebook URL
$email_twitter_url    = ""; // Twitter URL
$email_instagram_url  = ""; // Instagram URL
$email_pinterest_url  = ""; // Pinterest URL

?>
							<tr>
								<td class="content_cell footer_b brb tc">
									<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
										<tbody>
											<tr>
												<td class="column_cell pt tc">
													<?php echo wpautop( wp_kses_post( wptexturize( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ) ) ) ); ?>
													<?php if( $email_facebook_url != "" || $email_twitter_url != "" || $email_instagram_url != "" || $email_pinterest_url != "" ) :?>
														<p class="fsocial">
															<?php
																if ( $email_facebook_url != "" ) {
																	echo '&nbsp; <a href="' . $email_facebook_url . '">&nbsp;<img src="' . $theme_path . '/email_social-facebook.png" width="24" height="24" alt="Facebook" style="max-width:24px;" />&nbsp;</a> &nbsp;';
																}
																if ( $email_twitter_url != "" ) {
																	echo '&nbsp; <a href="' . $email_twitter_url . '">&nbsp;<img src="' . $theme_path . '/email_social-twitter.png" width="24" height="24" alt="Twitter" style="max-width:24px;" />&nbsp;</a> &nbsp;';
																}
																if ( $email_instagram_url != "" ) {
																	echo '&nbsp; <a href="' . $email_instagram_url . '">&nbsp;<img src="' . $theme_path . '/email_social-instagram.png" width="24" height="24" alt="Instagram" style="max-width:24px;" />&nbsp;</a> &nbsp;';
																}
																if ( $email_pinterest_url != "" ) {
																	echo '&nbsp; <a href="' . $email_pinterest_url . '">&nbsp;<img src="' . $theme_path . '/email_social-pinterest.png" width="24" height="24" alt="Pinterest" style="max-width:24px;" />&nbsp;</a> &nbsp;';
																}
															?>
														</p>
													<?php endif; ?>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
					</td>
				</tr>
			</tbody>
	</table>
</body>
</html>
