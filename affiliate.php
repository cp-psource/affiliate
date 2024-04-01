<?php
/*
Plugin Name: PS Affiliate
Plugin URI: https://cp-psource.github.io/affiliate/
Description: Dieses Plugin fügt Deiner Seite ein einfaches Affiliate-System hinzu. Verfolge eingehende Klicks von Affiliate-Referer-Links, die Integration der Auftragsverfolgung in PSeCommerce, bezahlte Bloghosting-Anmeldungen und bezahlte Mitgliedschaftsanmeldungen.
Author: DerN3rd (PSOURCE)
Version: 3.2.7
Author URI: https://github.com/cp-psource
Domain Path: /affiliateincludes/languages
*/

/**
 * @@@@@@@@@@@@@@@@@ PS UPDATER 1.3 @@@@@@@@@@@
 **/
require 'psource/psource-plugin-update/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;
 
$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/cp-psource/affiliate',
	__FILE__,
	'affiliate'
);
 
//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');

/**
 * @@@@@@@@@@@@@@@@@ ENDE PS UPDATER 1.3 @@@@@@@@@@@
 **/

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

