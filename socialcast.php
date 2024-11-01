<?php
/*
Plugin Name: SocialCast
Plugin URI: http://colorlabsproject.com/
Description: SocialCast helps you to create photo gallery from your social network.
Version: 1.0.0
Author: ColorLabs & Company
Author URI: http://colorlabsproject.com/
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'Please do not load this screen directly. Thanks!' );
}

require_once('includes/socialcast.class.php');

global $socialcast, $scinstagram, $scfacebook, $scflickr;

$socialcast = new SocialCast(__FILE__);
$socialcast->version = '1.0.0';

if (class_exists('SocialCast')):
	$socialcast = SocialCast::getInstance();
    if (isset($socialcast)){
		register_activation_hook(__FILE__, array(&$socialcast, 'activation'));
    }
endif;

// Includes Classes
require_once('includes/scinstagram.class.php');
require_once('includes/scfacebook.class.php');
require_once('includes/flickr/phpFlickr.php');
require_once('includes/scflickr.class.php');
require_once('includes/scpicasa.class.php');
require_once('includes/scpinterest.class.php');

if (class_exists('SCInstagram')):
	$scinstagram = SCInstagram::getInstance();
	if (isset($scinstagram)){
		register_activation_hook(__FILE__, array(&$scinstagram, 'install'));
	}
endif;

if (class_exists('SCFacebook')):
    $scfacebook = new SCFacebook();
endif;

?>