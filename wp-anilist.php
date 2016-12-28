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
include_once('cache/anilist_cacheLoader.php');
include_once('model/anilist_profile.class.php');
include_once('managers/anilist_connectionManager.class.php');
include_once('managers/anilist_animelistManager.class.php');


function anilist_activate() {

    if ( get_option( 'anilist_options' ) === false )
    {
        $options_array['anilist_username'] = '';
        $options_array['anilist_token'] = '';
        $options_array['anilist_refresh_token'] = '';
        $options_array['anilist_client_id'] = '';
        $options_array['anilist_client_secret'] = '';
        $options_array['anilist_version'] = '1.0';
        add_option( 'anilist_options', $options_array );

    }

    $table_animelist = file_get_contents(dirname(__FILE__).'/sql/wp_anilist_animelist.sql');
    $table_profile = file_get_contents(dirname(__FILE__).'/sql/wp_anilist_profile.sql');
    $table_characters = file_get_contents(dirname(__FILE__).'/sql/wp_anilist_characters.sql');
    $table_staff = file_get_contents(dirname(__FILE__).'/sql/wp_anilist_staff.sql');

    anilist_connectionManager::Instance()->query($table_profile);
    anilist_connectionManager::Instance()->query($table_animelist);
    anilist_connectionManager::Instance()->query($table_characters);
    anilist_connectionManager::Instance()->query($table_staff);

}

function anilist_deactivate() {

    if ( get_option( 'anilist_options' ) !== null )
    {
        delete_option( 'anilist_options' );
    }

}


register_activation_hook( __FILE__, 'anilist_activate' );
register_deactivation_hook( __FILE__, 'anilist_deactivate' );


// Action & Filter Hooks
add_action('admin_menu', 'anilist_add_menu');
add_action('admin_init', 'anilist_init_register_settings');


?>