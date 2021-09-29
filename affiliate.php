<?php
/*
Plugin Name: PS Affiliate
Plugin URI: https://n3rds.work/piestingtal-source-project/ps-affiliate/
Description: Dieses Plugin fügt Deiner Seite ein einfaches Affiliate-System hinzu. Verfolge eingehende Klicks von Affiliate-Referer-Links, die Integration der Auftragsverfolgung in PSeCommerce, bezahlte Bloghosting-Anmeldungen und bezahlte Mitgliedschaftsanmeldungen.
Author: WebMasterService N@W
Version: 3.2.6
Author URI: https://n3rds.work
Domain Path: /affiliateincludes/languages
*/
require 'psource/psource-plugin-update/psource-plugin-updater.php';
$MyUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://n3rds.work//wp-update-server/?action=get_metadata&slug=affiliate', 
	__FILE__, 
	'affiliate' 
);

require_once(plugin_dir_path( __FILE__ ) . 'affiliateincludes/includes/config.php');
require_once(plugin_dir_path( __FILE__ ) . 'affiliateincludes/includes/functions.php');
// Set up my location
set_affiliate_url(__FILE__);
set_affiliate_dir(__FILE__);

if(is_admin()) {
	include_once(plugin_dir_path( __FILE__ ) . 'affiliateincludes/includes/affiliate_admin_metaboxes.php');

	// Only include the administration side of things when we need to
	include_once(plugin_dir_path( __FILE__ ) . 'affiliateincludes/classes/affiliateadmin.php');
	include_once(plugin_dir_path( __FILE__ ) . 'affiliateincludes/classes/affiliatedashboard.php');

	$affadmin = new affiliateadmin();
	$affdash = new affiliatedashboard();
}

// Include the public and shortcode classes for both public and admin areas
include_once(plugin_dir_path( __FILE__ ) . 'affiliateincludes/classes/affiliatepublic.php');
include_once(plugin_dir_path( __FILE__ ) . 'affiliateincludes/classes/affiliateshortcodes.php');

$affiliate = new affiliate();
$affshortcode = new affiliateshortcodes();

