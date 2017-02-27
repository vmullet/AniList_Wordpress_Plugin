<?php

/**
 * Plugin Name: AniList Manager
 * Plugin URI: http://lostarchives.fr
 * Author: Valentin Mullet
 * Author URI: http://lostarchives.fr
 * Version: 1.0
 * Description: A plugin to manage your anime list
 */

include_once('menu/anilist-menu-register.php');
include_once('menu/anilist-menu-displayer.php');

require_once('managers/anilist_pluginManager.class.php');
require_once('managers/anilist_tokenManager.class.php');
require_once('managers/anilist_cacheManager.class.php');
require_once('managers/anilist_optionManager.class.php');
require_once('managers/anilist_connectionManager.class.php');
require_once('managers/anilist_queryManager.class.php');
require_once('managers/anilist_animelistManager.class.php');

function anilist_activate() {

    anilist_pluginManager::Instance()->create_options();
    anilist_pluginManager::Instance()->create_tables();
    anilist_pluginManager::Instance()->create_files();
    anilist_pluginManager::Instance()->create_pages();


}

function anilist_deactivate() {

    anilist_pluginManager::Instance()->remove_options();
    anilist_pluginManager::Instance()->remove_tables();
    anilist_pluginManager::Instance()->remove_files();
    anilist_pluginManager::Instance()->remove_pages();

}


register_activation_hook( __FILE__, 'anilist_activate' );
register_deactivation_hook( __FILE__, 'anilist_deactivate' );


// Action & Filter Hooks
add_action('admin_menu', 'anilist_add_menu');
add_action('admin_init', 'anilist_init_register_settings');


?>