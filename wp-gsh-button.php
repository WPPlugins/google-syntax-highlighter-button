<?php
/*
Plugin Name:Google Syntax Highlighter Button
Plugin URI: http://revolve.mods.jp/blog/archives/221
Description: This plugin provides a button for WP-Google Syntax Highlighter in TinyMCE editor. 
Version: 0.1 
Author: Kazuki Shibata
Author URI:  http://revolve.mods.jp/blog/
*/

// apply the css for rich editor
function replace_editor_css($css_file) {
   $css_file = get_option('siteurl') . '/wp-content/plugins/wp-gsh-button/richeditor.css';
   return $css_file;
}
add_filter('mce_css', 'replace_editor_css');

function gshb_addbuttons() {
	// Add only in Rich Editor mode
	if ( get_user_option('rich_editing') == 'true') {
	// add the button for wp25 in a new way
		add_filter("mce_external_plugins", "add_gshb_tinymce_plugin", 5);
		add_filter('mce_buttons', 'register_gshb_button', 5);
	}
}

// used to insert button in wordpress 2.5x editor
function register_gshb_button($buttons) {
	array_push($buttons, "separator", "gshb");
	return $buttons;
}

// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
function add_gshb_tinymce_plugin($plugin_array) {
	$plugin_array['gshb'] = get_option('siteurl').'/wp-content/plugins/wp-gsh-button/editor_plugin.js';	
	return $plugin_array;
}

function gshb_mce_valid_elements($init) {
	if ( isset( $init['extended_valid_elements'] ) 
	&& ! empty( $init['extended_valid_elements'] ) ) {
		$init['extended_valid_elements'] .= ',' . 'pre[name|class]';
	} else {
		$init['extended_valid_elements'] = 'pre[name|class]';
	}
	return $init;
}

function gshb_change_tinymce_version($version) {
	return ++$version;
}
// Add pre as a valid element to TinyMCE with lang and line arguments
add_filter('tiny_mce_before_init', 'gshb_mce_valid_elements', 0);
// Modify the version when tinyMCE plugins are changed.
add_filter('tiny_mce_version', 'gshb_change_tinymce_version');
// init process for button control
add_action('init', 'gshb_addbuttons');

?>
