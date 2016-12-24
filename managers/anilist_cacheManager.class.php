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

                    'record_id' => $record['record_id'],
                    'series_id' => $record['series_id'],
                    'list_status' => $record['list_status'],
                    'score' => $record['score'],
                    'episodes_watched' => $record['episodes_watched'],
                    'rewatched' => $record['rewatched'],
                    'notes' => $record['notes'],
                    'started_on' => $record['started_on'],
                    'finished_on' => $record['finished_on'],
                    'added_time' => $record['added_time'],
                    'updated_time' => $record['updated_time'],
                    'anime_title_romaji' => $record['anime']['title_romaji'],
                    'anime_title_english' => $record['anime']['title_english'],
                    'anime_title_japanese' => $record['anime']['title_japanese'],
                    'anime_type' => $record['anime']['type'],
                    'start_date_airing' => $record['anime']['start_date_fuzzy'],
                    'end_date_airing' => $record['anime']['end_date_fuzzy'],
                    'genres' => implode(';',$record['anime']['genres']),
                    'average_score' => $record['anime']['average_score'],
                    'img_lge' => $record['anime']['image_url_lge'],
                    'img_banner' => $record['anime']['image_url_banner'],
                    'total_episodes' => $record['anime']['total_episodes'],
                    'airing_status' => $record['anime']['airing_status'],
                    'popularity' => $record['anime']['popularity'],
                    'adult' => $record['anime']['adult']

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