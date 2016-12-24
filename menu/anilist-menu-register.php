<?php

function anilist_add_menu() {

//add_menu_page('AniList API','AniList API','administrator','anilist-main-menu','anilist_display_settings');
//add_submenu_page('anilist-main-menu','AniList API','All Settings','administrator','anilist-main-menu');
add_options_page('AniList API', 'AniList API', 'administrator', __FILE__, 'anilist_display_settings');
//add_submenu_page('anilist-main-menu','AniList API Settings','AniList API Settings','administrator','anilist-menu-settings','anilist_display_settings2');


}


?>