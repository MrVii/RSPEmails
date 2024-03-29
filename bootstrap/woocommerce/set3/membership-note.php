<?php
/**
 * WooCommerce Memberships
 *
 * This source file is subject to the GNU General Public License v3.0
 * that is bundled with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.html
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@skyverge.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade WooCommerce Memberships to newer
 * versions in the future. If you wish to customize WooCommerce Memberships for your
 * needs please refer to http://docs.woothemes.com/document/woocommerce-memberships/ for more information.
 *
 * @package   WC-Memberships/Templates
 * @author    SkyVerge
 * @copyright Copyright (c) 2014-2016, SkyVerge, Inc.
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

defined( 'ABSPATH' ) or exit;

/**
 * Membership note email
 *
 * @type string $email_heading Email heading
 * @type string $membership_note Membership note
 * @type \WC_Memberships_User_Membership $user_membership User Membership
 *
 * @version 1.0.0
 * @since 1.0.0
 */
 ?>

 <?php do_action( 'woocommerce_email_header', $email_heading ); ?>

            <p class="mb_xs"><?php esc_html_e( 'Hello, a note has just been added to your membership:', 'woocommerce-memberships' ); ?></p>
            <h3 class="mbe tm"><?php echo wpautop( wptexturize( $membership_note ) ) ?></h3>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
 </tr>

<?php do_action( 'woocommerce_email_footer' ); ?>
