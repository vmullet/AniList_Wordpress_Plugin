<?php

/**
 * Plugin Name: AniList Manager
 * Plugin URI: http://lostarchives.fr
 * Author: Valentin Mullet
 * Author URI: http://lostarchives.fr
 * Version: 1.0
 * Licence: GPLv2
 * Description: A plugin to manage your anime list
 */

include_once('menu/anilist-menu-register.php');
include_once('menu/anilist-menu-displayer.php');
include_once('managers/anilist_queryManager.class.php');
include_once('managers/anilist_connectionManager.class.php');
include_once('managers/anilist_tokenManager.class.php');
include_once('cache/anilist_cacheLoader.php');
include_once('model/anilist_profile.class.php');

function anilist_activate() {

    if ( get_option( 'anilist_options' ) === false )
    {
        $options_array['anilist_username'] = 'LostArchives';
        $options_array['anilist_token'] = '';
        $options_array['anilist_refresh_token'] = '';
        $options_array['anilist_client_id'] = '';
        $options_array['anilist_client_secret'] = '';
        $options_array['anilist_version'] = '1.0';
        add_option( 'anilist_options', $options_array );
    }
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