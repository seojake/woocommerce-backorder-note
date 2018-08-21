<?php
/*
Plugin Name:  Backorder Note for WooCommerce
Plugin URI:   https://github.com/seojake/woocommerce-backorder-note
Description:  Add custom preorder notes to let your customers know when their item will be shipped.
Version:      1.0.0
Author:       Jake Punton
Author URI:   https://seojake.com/
License:      GNU General Public License v3.0
License URI:  https://www.gnu.org/licenses/gpl-3.0.en.html
Text Domain:  woo_backorder
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define('WOOBACKORDER__PLUGIN_DIR', plugin_dir_path( __FILE__));

require_once(WOOBACKORDER__PLUGIN_DIR . 'views/product.php');
require_once(WOOBACKORDER__PLUGIN_DIR . 'views/category.php');
require_once(WOOBACKORDER__PLUGIN_DIR . 'controller/backorder-note.php');
