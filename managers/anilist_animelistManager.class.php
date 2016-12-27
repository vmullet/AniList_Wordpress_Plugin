<?php

include_once(dirname(__FILE__).'/anilist_connectionManager.class.php');
include_once(dirname(__FILE__,2) . '/model/anilist_anime.class.php');

class anilist_animelist{

private static $instance = null;

private function __construct() {}

public static function Instance() {

    if (!isset(self::$instance)) {

        self::$instance = new anilist_animelist();
    }

    return self::$instance;

}

    /**
     * @return anilist_anime[]
     */
public function LoadAnimeList() {

    $animelist = array();
    $rawlist = anilist_connectionManager::Instance()->select('Select * from wp_anilist_animelist');

    foreach($rawlist as $anime_data) {
        $anime = new anilist_anime(
        $anime_data['series_id'],
        $anime_data['list_status'],
        $anime_data['score'],
        $anime_data['episodes_watched'],
        $anime_data['notes'],
        $anime_data['started_on'],
        $anime_data['finished_on'],
        $anime_data['added_time'],
        $anime_data['updated_time'],
        $anime_data['anime_title_romaji'],
        $anime_data['anime_title_english'],
        $anime_data['anime_title_japanese'],
        $anime_data['description'],
        $anime_data['anime_type'],
        $anime_data['start_date_airing'],
        $anime_data['end_date_airing'],
        $anime_data['genres'],
        $anime_data['studio_name'],
        $anime_data['average_score'],
        $anime_data['img_lge'],
        $anime_data['img_banner'],
        $anime_data['total_episodes'],
        $anime_data['airing_status'],
        $anime_data['popularity'],
        $anime_data['adult']
    );
        $animelist[] = $anime;

    }
    return $animelist;

}

public function LoadAnime($anime_id) {

    $anime_data = anilist_connectionManager::Instance()->select('Select * from wp_anilist_animelist where series_id='.$anime_id)[0];

    $anime = new anilist_anime(
        $anime_data['series_id'],
        $anime_data['list_status'],
        $anime_data['score'],
        $anime_data['episodes_watched'],
        $anime_data['notes'],
        $anime_data['started_on'],
        $anime_data['finished_on'],
        $anime_data['added_time'],
        $anime_data['updated_time'],
        $anime_data['anime_title_romaji'],
        $anime_data['anime_title_english'],
        $anime_data['anime_title_japanese'],
        $anime_data['description'],
        $anime_data['anime_type'],
        $anime_data['start_date_airing'],
        $anime_data['end_date_airing'],
        $anime_data['genres'],
        $anime_data['studio_name'],
        $anime_data['average_score'],
        $anime_data['img_lge'],
        $anime_data['img_banner'],
        $anime_data['total_episodes'],
        $anime_data['airing_status'],
        $anime_data['popularity'],
        $anime_data['adult']
    );

    return $anime;

}

    /**
     * @return anilist_character[]
     */
public function LoadCharacters($anime_id) {

    $characters_list = array();
    $rawlist = anilist_connectionManager::Instance()->select('Select * from wp_anilist_characters where series_id='.$anime_id);

    foreach($rawlist as $character_data) {

        $character = new anilist_character(

            $character_data['character_id'],
            $character_data['name_first'],
            $character_data['name_last'],
            $character_data['img_lge'],
            $character_data['role'],
            $character_data['series_id'],
            $character_data['actor_name_first'],
            $character_data['actor_name_last'],
            $character_data['actor_img_lge'],
            $character_data['actor_language'],
            $character_data['actor_role']


        );



        $characters_list[] = $character;
    }

    return $characters_list;
}

    /**
     * @return anilist_staff[]
     */
public function LoadStaff($anime_id) {

    $staff_list = array();

    $rawlist = anilist_connectionManager::Instance()->select('Select * from wp_anilist_staff where series_id='.$anime_id);

    foreach($rawlist as $staff_data) {

        $staff = new anilist_staff(
            $staff_data['name_first'],
            $staff_data['name_last'],
            $staff_data['language'],
            $staff_data['img_lge'],
            $staff_data['role'],
            $staff_data['series_id']

        );


        $staff_list[] = $staff;

    }
    return $staff_list;
}





}


?>