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

        anilist_connectionManager::Instance()->query('Delete from wp_anilist_characters');
        anilist_connectionManager::Instance()->query('Delete from wp_anilist_staff');
        anilist_connectionManager::Instance()->query('Delete from wp_anilist_animelist');

        foreach($lists as $watch_state) { /* State can be 'Watching','Completed',... */

            foreach($watch_state as $record) {

                $anime_data = anilist_queryManager::Instance()->getBody('https://anilist.co/api/anime/'.$record['series_id'].'/page?access_token='.$this->options['anilist_token']);

                /////////////////////////////////Insert Anime Data Section///////////////////////////////////////////////

                anilist_connectionManager::Instance()->insert('wp_anilist_animeList',array(

                    'record_id' => $record['record_id'],
                    'series_id' => $record['series_id'],
                    'list_status' => str_replace(' ','_',$record['list_status']),
                    'score' => $record['score'],
                    'episodes_watched' => $record['episodes_watched'],
                    'rewatched' => $record['rewatched'],
                    'notes' => $record['notes'],
                    'started_on' => $record['started_on'],
                    'finished_on' => $record['finished_on'],
                    'added_time' => $record['added_time'],
                    'updated_time' => $record['updated_time'],
                    'anime_title_romaji' => $anime_data['title_romaji'],
                    'anime_title_english' => $anime_data['title_english'],
                    'anime_title_japanese' => $anime_data['title_japanese'],
                    'description' => $anime_data['description'],
                    'anime_type' => $anime_data['type'],
                    'season' => $anime_data['season'],
                    'start_date_airing' => $anime_data['start_date_fuzzy'],
                    'end_date_airing' => $anime_data['end_date_fuzzy'],
                    'genres' => implode(';',$anime_data['genres']),
                    'studio_name' => implode(';',array_column($anime_data['studio'],'studio_name')),
                    'average_score' => $anime_data['average_score'],
                    'img_lge' => $anime_data['image_url_lge'],
                    'img_banner' => $anime_data['image_url_banner'],
                    'total_episodes' => $anime_data['total_episodes'],
                    'airing_status' => $anime_data['airing_status'],
                    'popularity' => $anime_data['popularity'],
                    'adult' => $anime_data['adult']

                ));

                //////////////////////////////End Insert Anime Data Section//////////////////////////////////////////////

                //https://anilist.co/api/character/24184?access_token=OpawlEFYyca2j3f13LxqXoE0mcrqA9m9rXFDaM7N


                /////////////////////////////////Insert Characters Data Section//////////////////////////////////////////
                    foreach($anime_data['characters'] as $character) {

                        $character_data = anilist_queryManager::Instance()->getBody('https://anilist.co/api/character/'.$character['id'].'/page?access_token='.$this->options['anilist_token']);

                        if (isset($character['actor'][0])) {
                            anilist_connectionManager::Instance()->insert('wp_anilist_characters',array(

                                'character_id' => $character['id'],
                                'name_first' => $character['name_first'],
                                'name_last' => $character['name_last'],
                                'info' => $character_data['info'],
                                'img_lge' => $character['image_url_lge'],
                                'role' => $character['role'],
                                'series_id' => $record['series_id'],
                                'actor_name_first' => $character['actor'][0]['name_first'],
                                'actor_name_last' => $character['actor'][0]['name_last'],
                                'actor_img_lge' => $character['actor'][0]['image_url_lge'],
                                'actor_language' => $character['actor'][0]['language'],
                                'actor_role' => $character['actor'][0]['role']


                            ));
                        }
                        else
                        {
                            anilist_connectionManager::Instance()->insert('wp_anilist_characters',array(

                                'character_id' => $character['id'],
                                'name_first' => $character['name_first'],
                                'name_last' => $character['name_last'],
                                'info' => $character_data['info'],
                                'img_lge' => $character['image_url_lge'],
                                'role' => $character['role'],
                                'series_id' => $record['series_id']

                            ));
                        }


                    }


                //////////////////////////////End Insert Characters Data Section/////////////////////////////////////////


                //////////////////////////////Start Insert Staff Data Section////////////////////////////////////////////
                    foreach($anime_data['staff'] as $staff_member) {


                        anilist_connectionManager::Instance()->insert('wp_anilist_staff',array(

                            'staff_id' => $staff_member['id'],
                            'name_first' => $staff_member['name_first'],
                            'name_last' => $staff_member['name_last'],
                            'language' => $staff_member['language'],
                            'img_lge' => $staff_member['image_url_lge'],
                            'role' => $staff_member['role'],
                            'series_id' => $record['series_id']

                        ));

                    }

                //////////////////////////////End Insert Staff Data Section//////////////////////////////////////////////



            }


        }

    }

    public function cacheProfile() {

        $response = anilist_queryManager::Instance()->getBody('https://anilist.co/api/user/'.$this->options['anilist_username'].'?access_token='.$this->options['anilist_token']);

        anilist_connectionManager::Instance()->query('Delete from wp_anilist_profile');

        $total_anime = $response['stats']['status_distribution']['anime']['watching']
                        +$response['stats']['status_distribution']['anime']['plan to watch']
                        +$response['stats']['status_distribution']['anime']['completed']
                        +$response['stats']['status_distribution']['anime']['dropped']
                        +$response['stats']['status_distribution']['anime']['on-hold'];

        anilist_connectionManager::Instance()->insert('wp_anilist_profile',array(

            'id' => $response['id'],
            'username' => $response['display_name'],
            'anime_time' => $response['anime_time'],
            'avatar' => $response['image_url_lge'],
            'nb_anime_watching' => $response['stats']['status_distribution']['anime']['watching'],
            'nb_anime_plan_watch' => $response['stats']['status_distribution']['anime']['plan to watch'],
            'nb_anime_completed' => $response['stats']['status_distribution']['anime']['completed'],
            'nb_anime_dropped' => $response['stats']['status_distribution']['anime']['dropped'],
            'nb_anime_onhold' => $response['stats']['status_distribution']['anime']['on-hold'],
            'nb_anime_total' => $total_anime

        ));


    }



}


?>