<?php

class anilist_pluginManager {


    private $instance = null;

    const ANILIST_CACHE = 'Anilist Cache';
	const ANILIST_ACTION = 'Anilist Action';

    private function __construct()
    {
    }

    public static function Instance() {

        if (!isset($instance)) {

            $instance = new anilist_pluginManager();

        }

        return$instance;

    }

    public function create_options() {

        anilist_optionManager::Instance()->init_options();

    }

    public function remove_options() {

        anilist_optionManager::Instance()->erase_options();

    }

    public function create_tables() {

        $animelist_table  = file_get_contents(dirname(__FILE__,2) . '/sql/wp_anilist_animelist.sql');
        $character_table   = file_get_contents(dirname(__FILE__,2) . '/sql/wp_anilist_characters.sql');
        $staff_table  = file_get_contents(dirname(__FILE__,2) . '/sql/wp_anilist_staff.sql');
        $profile_table  = file_get_contents(dirname(__FILE__,2) . '/sql/wp_anilist_profile.sql');

        anilist_connectionManager::Instance()->query($animelist_table);
        anilist_connectionManager::Instance()->query($character_table);
        anilist_connectionManager::Instance()->query($staff_table);
        anilist_connectionManager::Instance()->query($profile_table);

    }

    public function remove_tables() {

        anilist_connectionManager::Instance()->query('DROP TABLE IF EXISTS wp_anilist_characters');
        anilist_connectionManager::Instance()->query('DROP TABLE IF EXISTS wp_anilist_staff');
        anilist_connectionManager::Instance()->query('DROP TABLE IF EXISTS wp_anilist_animelist');
        anilist_connectionManager::Instance()->query('DROP TABLE IF EXISTS wp_anilist_profile');

    }

    public function create_pages() {

        /////////////////// Create Anilist Cache Page ////////////////////////

        $cache_page_info = array(
            'comment_status' => 'closed',
            'ping_status' => 'closed',
            'post_title' => self::ANILIST_CACHE,
            'post_author' => '1',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_name' => 'anilist-cache',
            'page_template' => 'template-anilist-cache.php'
        );

        if (null == get_page_by_title(self::ANILIST_CACHE)) {
            wp_insert_post($cache_page_info);

        }
		
		////////////////// Create Anilist Action Page ///////////////////////////
		
		$action_page_info = array(
            'comment_status' => 'closed',
            'ping_status' => 'closed',
            'post_title' => self::ANILIST_ACTION,
            'post_author' => '1',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_name' => 'anilist-action',
            'page_template' => 'template-anilist-action.php'
        );

        if (null == get_page_by_title(self::ANILIST_ACTION)) {
            wp_insert_post($action_page_info);

        }

    }

    public function remove_pages() {

        $cache_page = get_page_by_title(self::ANILIST_CACHE);

        if (null != $cache_page) {
            wp_delete_post($cache_page->ID, true);
        }
		
		$action_page = get_page_by_title(self::ANILIST_ACTION);

        if (null != $action_page) {
            wp_delete_post($action_page->ID, true);
        }

    }

    public function create_files() {

        if (!file_exists(get_template_directory() . '/template-anilist-cache.php')) {
            copy(dirname(__FILE__,2) . '/templates/template-anilist-cache.php', get_template_directory() . '/template-anilist-cache.php');
        }
		
		if (!file_exists(get_template_directory() . '/template-anilist-action.php')) {
            copy(dirname(__FILE__,2) . '/templates/template-anilist-action.php', get_template_directory() . '/template-anilist-action.php');
        }

    }

    public function remove_files() {

        if (file_exists(get_template_directory() . '/template-anilist-cache.php')) {
            unlink(get_template_directory() . '/template-anilist-cache.php');
        }
		
		if (file_exists(get_template_directory() . '/template-anilist-action.php')) {
            unlink(get_template_directory() . '/template-anilist-action.php');
        }
    }


}






?>