<?php
define('WPSHARE247_WG_DIR', dirname(__FILE__));

require_once(WPSHARE247_WG_DIR . '/widget_helper/wpshare247_repeat_sortable.php');

$arr_init_wg = array(
	'wpshare247_header_hero',
	'wpshare247_feature',
	'wpshare247_product',
	'wpshare247_technical',
	'wpshare247_notification',
	'wp_video',
	'wp_reviewsandtestimonials',
	'wp_contact',
);

require_once(WPSHARE247_WG_DIR . '/widget_helper/wpshare247_module_widget.php');
