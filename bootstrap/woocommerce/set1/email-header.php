<?php
/**
 * Email Header
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-header.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates/Emails
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$theme_path          = get_stylesheet_directory_uri().'/woocommerce/emails/images'; // images folder
$default_background  = $theme_path .'/hero_background.png'; // background image
$logo_width					 = "136"; // logo width in pixels

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<!--[if !mso]><!-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--<![endif]-->
	<title><?php echo get_bloginfo( 'name', 'display' ); ?></title>
</head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
	<table role="presentation" class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<td class="email_body email_start email_end tc">
					<!--[if (mso)|(IE)]><table role="presentation" width="640" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:640px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<table role="presentation" class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0">
						<tbody>
							<tr>
								<td class="content_cell content_b pb tc">
									<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
										<tbody>
											<tr>
												<td class="column_cell logo_c pt tc">
													<?php
														if ( $img = get_option( 'woocommerce_email_header_image' ) ) {
															echo '<a href="' . get_home_url() . '" class="tp"><img src="' . esc_url( $img ) . '" width="'. $logo_width .'" height="" alt="' . get_bloginfo( 'name', 'display' ) . '" style="max-width:'. $logo_width .'px;" /></p>';
														}
														else {
															echo '<h2 class="mt_0 mb_0 tp"><a href="' . get_home_url() . '" class="tp"><span class="tp">' . get_bloginfo( 'name', 'display' ) . '</span></a></h2>';
														}
													?>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<td class="content_cell hero_b bra py tc" background="<?php echo $default_background; ?>">
									<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
										<tbody>
											<tr>
												<td class="column_cell pte pb tc sc">
													<table role="presentation" class="ic_h" align="center" width="80" border="0" cellspacing="0" cellpadding="0">
														<tbody>
															<tr>
																<td class="content_b">
																	<p class="imgr mb_0"><img role="img" src="<?php echo $theme_path; ?>/shopping-cart.png" width="48" height="48" alt="Shopping cart symbol" style="max-width:48px;" /></p>
																</td>
															</tr>
														</tbody>
													</table>
													<h1 class="mb_0 sc"><?php echo $email_heading; ?></h1>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<td class="content_cell content_b pte tc">
									<table role="presentation" class="column" width="100%" border="0" cellspacing="0" cellpadding="0">
										<tbody>
											<tr>
												<td class="column_cell tc">
