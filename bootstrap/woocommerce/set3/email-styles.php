<?php
/**
 * Email Styles
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-styles.php.
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
 * @version 2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Load colors
$bg              		 = get_option( 'woocommerce_email_background_color' );
$body           		 = get_option( 'woocommerce_email_body_background_color' );
$base           		 = get_option( 'woocommerce_email_base_color' );
$base_text      		 = "#ffffff";
$text           		 = get_option( 'woocommerce_email_text_color' );

$text_darker    	   = wc_hex_darker( $text, 40 );
$text_lighter 		   = wc_hex_lighter( $text, 40 );

// !important; is a gmail hack to prevent styles being stripped if it doesn't like something.
?>
table, td, div {
	box-sizing: border-box; }

table, td {
	mso-table-lspace: 0pt;
	mso-table-rspace: 0pt; }

html,
body {
	width: 100% !important;
	min-width: 100%;
	Margin: 0;
	padding: 0;
	-webkit-text-size-adjust: 100%;
	-ms-text-size-adjust: 100%; }

.email_body td,
.email_body div,
.email_body a,
.email_body span {
	line-height: inherit; }

.email_body a {
	text-decoration: none; }

#outlook a {
	padding: 0; }

img {
	outline: none;
	border: 0;
	text-decoration: none;
	-ms-interpolation-mode: bicubic;
	clear: both;
	line-height: 100%; }

table {
	border-spacing: 0;
	mso-table-lspace: 0pt;
	mso-table-rspace: 0pt; }

td {
	vertical-align: top; }

.email_table,
.content_section,
.column,
.col_1,
.col_12,
.col_2,
.col_3,
.col_thumb,
.col_description {
	width: 100%;
	min-width: 100%;
	min-width: 0 !important; }

.email_body,
.content_cell,
.col_1,
.col_12,
.col_2,
.col_3,
.col_thumb,
.col_description {
	font-size: 0 !important;
	line-height: 100%; }

.col_1,
.col_12,
.col_2,
.col_3,
.col_thumb,
.col_description {
	display: inline-block;
	vertical-align: top; }

.content_section {
	max-width: 640px;
	Margin: 0 auto;
	text-align: center; }

.email_body,
.content_cell,
.column_cell {
	padding-left: 8px;
	padding-right: 8px; }

.email_start {
	padding-top: 32px; }

.email_end {
	padding-bottom: 32px; }

.column_cell {
	vertical-align: top; }

.col_1 {
	max-width: 156px; }

.col_12 {
	max-width: 192px; }

.col_2 {
	max-width: 312px; }

.col_3 {
	max-width: 468px; }

.col_thumb {
	max-width: 80px; }

.col_description {
	max-width: 544px; }

.column_cell,
.column_cell p,
.wc-item-meta li,
.ebtn a,
.ebtn span,
.column_cell h1,
.column_cell h2,
.column_cell h3,
.column_cell h4 {
	font-family: Arial, Helvetica, sans-serif; }

.ebtn a,
.ebtn span,
.column_cell h1,
.column_cell h2,
.column_cell h3,
.column_cell h4 {
	font-weight: bold; }

.column_cell,
.column_cell p,
.wc-item-meta li {
	font-size: 16px;
	color: <?php echo esc_attr( $text ); ?> }

.column_cell p {
	line-height: 23px;
	mso-line-height-rule: exactly;
	Margin-top: 0;
	Margin-bottom: 24px; }
	.column_cell p.lead {
		font-size: 20px;
		line-height: 27px; }
.wc-item-meta {
	Margin-top: 0;
	Margin-bottom: 0;
	padding-left: 0;
	list-style: none;
}
.wc-item-meta li {
	line-height: 23px;
	mso-line-height-rule: exactly;
	padding-bottom: 2px;
}
.column_cell h1,
.column_cell h2,
.column_cell h3,
.column_cell h4 {
	padding: 0;
	Margin-left: 0;
	Margin-right: 0;
	Margin-top: 16px;
	Margin-bottom: 8px;
	color:  <?php echo esc_attr( $text_darker ); ?>; }
	.column_cell h1 a,
	.column_cell h1 a span,
	.column_cell h2 a,
	.column_cell h2 a span,
	.column_cell h3 a,
	.column_cell h3 a span,
	.column_cell h4 a,
	.column_cell h4 a span {
		color:  <?php echo esc_attr( $text_darker ); ?>; }

.column_cell h1 {
	font-size: 26px;
	line-height: 34px; }

.column_cell h2 {
	font-size: 20px;
	line-height: 26px; }

.column_cell h3 {
	font-size: 18px;
	line-height: 23px; }

.column_cell h4 {
	font-size: 14px;
	line-height: 18px; }

.footer_b .column_cell,
.footer_b .column_cell p,
.footer_b .column_cell a,
.footer_b .column_cell a span {
	color: #8f8f8f; }

.email_body,
.content_b,
html,
body {
	background-color: <?php echo esc_attr( $bg ); ?>; }
a,
.column_cell a,
.column_cell a span,
.column_cell.tp,
.column_cell .tp {
	color: <?php echo esc_attr( $base ); ?>; }
.nav_menu {
	text-align: right;
	padding-top: 24px; }
	.nav_menu p {
		line-height: 100%; }

.hdr_menu {
	text-align: right;
	padding-top: 10px; }
	.hdr_menu p {
		line-height: 100%; }

.hdr_menu a,
.email_body a.blink,
.email_body a.blink:visited {
	text-decoration: none; }

.email_body .logo_c {
	line-height: 100%; }

.logo_c img {
	width: auto;
	height: 32px; }

.email_body .fsocial {
	line-height: 100%; }

.fsocial img {
	width: 24px;
	height: 24px; }

.hr_ep {
	font-size: 0;
	line-height: 1px;
	mso-line-height-rule: exactly;
	min-height: 1px;
	overflow: hidden;
	height: 2px;
	background-color: transparent !important; }

.accent_b {
	background-color: <?php echo esc_attr( $base ); ?>
}

.hero_b {
	background-color: <?php echo esc_attr( $base ); ?>;
	background-repeat: no-repeat;
	background-position: top center; }
.footer_b {
	background-color: #f0f0f0; }

img {
	max-width: 200px; }

.column_cell .imgr,
.column_cell .imgr img {
	width: 100%;
	height: auto;
	clear: both;
	font-size: 0;
	line-height: 100%; }

.column_cell .imgr a,
.column_cell .imgr span {
	line-height: 1; }

.ebtn,
.ebtn_xs,
.ic_h,
.hr_rl {
	display: table;
	margin-left: auto;
	margin-right: auto; }

.ebtn td {
	font-size: 17px;
  font-weight: bold;
  padding: 10px 18px;
  line-height: 22px;
  mso-line-height-rule: exactly;
  border-radius: 4px;
  text-align: center; }
	.ebtn td a {
		text-decoration: none; }
	.ebtn td a,
	.ebtn td a span {
		color: #ffffff; }

.ic_h td {
	padding: 16px;
	text-align: center;
	vertical-align: middle;
	line-height: 100%;
	mso-line-height-rule: exactly;
	border-radius: 100px; }

.ic_h img {
	line-height: 100%; }

.email_summary {
	display: none;
	font-size: 1px;
	line-height: 1px;
	max-height: 0px;
	max-width: 0px;
	opacity: 0;
	overflow: hidden; }

.brt {
	border-radius: 4px 4px 0 0; }

.brb {
	border-radius: 0 0 4px 4px; }

.bra {
	border-radius: 4px; }

.braf {
	border-radius: 200px; }

.column_cell.tm,
.column_cell .tm,
.column_cell .tm a,
.column_cell .tm span {
	color: <?php echo esc_attr( $text_lighter ); ?>; }

.column_cell.sc,
.column_cell .sc,
.column_cell.sc p,
.column_cell.sc a,
.column_cell.sc a span {
	color: <?php echo esc_attr( $base_text ); ?>; }

.tdel {
	text-decoration: line-through; }

.tc {
	text-align: center; }

.tc .imgr img {
	margin-left: auto;
	margin-right: auto; }

.tl {
	text-align: left; }

table.tl {
	margin-left: 0;
	margin-right: auto; }

.tr {
	text-align: right; }

table.tr {
	margin-left: auto;
	margin-right: 0; }

.py {
	padding-top: 16px;
	padding-bottom: 16px; }

.px {
	padding-left: 16px;
	padding-right: 16px; }

.pxs {
	padding-left: 8px;
	padding-right: 8px; }

.pt {
	padding-top: 16px; }

.pte {
	padding-top: 32px; }

.pb {
	padding-bottom: 16px; }

.pb_xs {
	padding-bottom: 8px; }

.pbe {
	padding-bottom: 24px; }

.pte_lg {
	padding-top: 64px; }

.pl_0,
.content_cell.pl_0 {
	padding-left: 0; }

.pr_0,
.content_cell.pr_0 {
	padding-right: 0; }

.column_cell .mte {
	margin-top: 32px; }

.column_cell .mt {
	margin-top: 16px; }

.column_cell .mt_xs {
	margin-top: 8px; }

.column_cell .mt_0 {
	margin-top: 0; }

.column_cell .mb_0 {
	margin-bottom: 0; }

.column_cell .mb_xs {
	margin-bottom: 8px; }

.column_cell .mb {
	margin-bottom: 16px; }

.column_cell .mbe {
	margin-bottom: 32px; }

.bt {
	border-top: 1px solid; }

.bb {
	border-bottom: 1px solid; }

.bt,
.bb {
	border-color: #dfdfdf; }

.clear {
	content: ' ';
	display: block;
	clear: both;
	height: 1px;
	overflow: hidden;
	font-size: 0; }

@media only screen {
	.column_cell,
  .column_cell p,
  .ebtn a,
  .ebtn span,
	.column_cell h1,
  .column_cell h2,
  .column_cell h3,
  .column_cell h4 {
    font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif !important;
    font-weight: 400 !important; }
  .ebtn a,
  .ebtn span,
  .column_cell strong,
  .column_cell h1,
  .column_cell h2,
  .column_cell h3,
  .column_cell h4 {
    font-weight: 500 !important; }
	.column_cell a {
		display: inline-block; }
	.column_cell a[href],
	.column_cell a[href^=tel],
	.column_cell a[href^=mailto] {
		color: <?php echo esc_attr( $base ); ?>!important;
		text-decoration: none!important;
	 }
		.column_cell a img {
			vertical-align: middle; }
	.ebtn td {
		padding: 0 !important; }
	.ebtn a {
		display: block !important;
    padding: 8px 18px !important;
    line-height: 26px !important; }
		.ebtn a span {
			display: block !important;
			text-align: center !important;
			vertical-align: top !important;
			line-height: inherit !important; } }

@media (max-width: 657px) {
	.col_1,
	.col_12,
	.col_2,
	.col_3,
	.col_thumb,
	.col_description {
		max-width: none !important; }
	.nav_menu {
		padding-top: 18px !important; }
	.email_start {
		padding-top: 8px !important; }
	.email_end {
		padding-bottom: 8px !important; }
	.nav_menu,
	.logo_c {
		text-align: center !important; }
	.email_start .content_cell {
		position: relative; }
	.col_nav {
		width: auto !important;
		max-width: none !important;
		position: absolute;
		right: 8px;
		top: 2px; }
	.pte_lg,
	.py.pte_lg {
		padding-top: 32px !important; }
	.switch_xs {
		text-align: left !important; }
	.switch_tc {
		text-align: center !important; }
	.switch_tc table.tl {
		float: none !important;
		margin-left: auto !important;
		margin-right: auto !important; }
	.hide {
		max-height: 0 !important;
		display: none !important;
		mso-hide: all !important;
		overflow: hidden !important;
		font-size: 0 !important; } }
<?php
