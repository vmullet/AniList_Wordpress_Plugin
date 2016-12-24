<?php

include_once('anilist_connectionManager.class.php');
include_once('anilist_queryManager.class.php');

class anilist_cacheManager
{

    private static $instance = null;
    private $options;

    private function __construct() {
        $this->options = get_option('anilist_options');
    }

    public static function Instance()
    {

        if (!isset(self::$instance)) {

            self::$instance = new anilist_cacheManager();

        }

        return self::$instance;


    }


    public function cacheAnimeList() {

        $lists = anilist_queryManager::Instance()->getBody('https://anilist.co/api/user/'.$this->options['anilist_username'].'/animelist?access_token='.$this->options['anilist_token'])['lists'];

        anilist_connectionManager::Instance()->query('Delete from wp_anilist_animelist');

        foreach($lists as $watch_state) { /* State can be 'Watching','Completed',... */

            foreach($watch_state as $record) {

                anilist_connectionManager::Instance()->insert('wp_anilist_animeList',array(



                ));

            }


        }

    }

    public function cacheProfile() {

        $response = anilist_queryManager::Instance()->getBody('https://anilist.co/api/user/'.$this->options['anilist_username'].'?access_token='.$this->options['anilist_token']);

        anilist_connectionManager::Instance()->query('Delete from wp_anilist_profile');

        anilist_connectionManager::Instance()->insert('wp_anilist_profile',array(

            'id' => $response['id'],
            'username' => $response['display_name'],
            'anime_time' => $response['anime_time'],
            'avatar' => $response['image_url_lge'],
            'nb_anime_watching' => $response['stats']['status_distribution']['anime']['watching'],
            'nb_anime_plan_watch' => $response['stats']['status_distribution']['anime']['plan to watch'],
            'nb_anime_completed' => $response['stats']['status_distribution']['anime']['completed'],
            'nb_anime_dropped' => $response['stats']['status_distribution']['anime']['dropped'],
            'nb_anime_onhold' => $response['stats']['status_distribution']['anime']['on-hold']

        ));


    }



}


?>