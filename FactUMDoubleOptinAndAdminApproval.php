<?php

/**
 * Plugin Name:     FACT Ultimate Member - Double Optin and admin approval
 * Description:     Extension to Ultimate Member to extend the standard double optin with additional admin approval.
 * Version:         1.0.0
 * Requires PHP:    7.4
 * Author:          Julian Paul
 * License:         GPL v2 or later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Author URI:      https://github.com/jolle93/fact-um-double-optin-and-admin-approval
 * Plugin URI:      https://github.com/jolle93/fact-um-double-optin-and-admin-approval
 * Update URI:      https://github.com/jolle93/fact-um-double-optin-and-admin-approval
 * Text Domain:     ultimate-member
 * Domain Path:     /languages
 * UM version:      2.9.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'UM' ) ) {
	return;
}

class FactUMDoubleOptinAndAdminApproval {

	public function __construct() {
		add_action( 'um_after_email_confirmation', 'um_after_email_confirmation_admin_approval', 10, 1 );
	}


	function um_after_email_confirmation_admin_approval( $user_id ) {
		UM()->common()->users()->set_as_pending( um_user( $user_id ) );

		um_send_registration_notification( $user_id );
	}


}


new FactUMDoubleOptinAndAdminApproval();
