<?php
/**
 * Plugin Name: Quoteabilly
 * Plugin URI: https://benmarshall.me/quoteabilly
 * Description: A simple, light-weight WordPress plugin that allows you to easily add shareable quotes via shortcodes.
 * Version: 1.0.0
 * Author: Ben Marshall
 * Author URI: https://benmarshall.me
 * License: GPL2
 */

/*  Copyright 2015  Ben Marshall  (email : me@benmarshall.me)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * Security Note: Blocks direct access to the plugin PHP files.
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Define constants.
if( ! defined( 'QUOTEABILLY_ROOT ' ) ) {
  define( 'QUOTEABILLY_ROOT', plugin_dir_path( __FILE__ ) );
}

if( ! defined( 'QUOTEABILLY_PLUGIN ' ) ) {
  define( 'QUOTEABILLY_PLUGIN', __FILE__ );
}

spl_autoload_register( 'quoteabilly_autoloader' );
function quoteabilly_autoloader( $class_name ) {
  if ( false !== strpos( $class_name, 'Quoteabilly' ) ) {
    $classes_dir = QUOTEABILLY_ROOT . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
    $class_file = str_replace( '_', DIRECTORY_SEPARATOR, $class_name ) . '.php';
    require_once $classes_dir . $class_file;
  }
}

// Load the plugin features.
$plugin               = new Quoteabilly_Plugin();
$plugin['scripts']    = new Quoteabilly_Scripts();
$plugin['shortcodes'] = new Quoteabilly_Shortcodes();

// Initialize the plugin.
$plugin->run();
