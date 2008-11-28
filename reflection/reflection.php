<?php
/*
Plugin Name: Reflection
Plugin URI: http://code.google.com/p/bitpress/wiki/Reflection
Description: Apply reflection effect to images with specific class value.
Version: 0.1
Author: Cliffano Subagio
Author URI: http://blog.qoqoa.com
*/

class ComQoqoaReflection {

	function ComQoqoaReflection() {
		add_action('wp_head', array(&$this, 'head'), 888);
		add_action('wp_footer', array(&$this, 'footer'), 888);
	}
	
	function head() {
		echo "\n" . '<script type="text/javascript" src="' . get_option('siteurl') . '/wp-content/plugins/reflection/' . 'reflection-raphael.js"></script>' . "\n";
	}
	
	function footer() {
		echo "\n" . '<script type="text/javascript" src="' . get_option('siteurl') . '/wp-content/plugins/reflection/' . 'reflection.js"></script>' . "\n";
	}
}

$com_qoqoa_reflection = new ComQoqoaReflection();
?>