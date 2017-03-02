<?php

/*
Template Name: AniList Action
*/

$action = $_POST['action'];

$series_id = $_POST['series_id'];

$list_status = $_POST['list_status'];

$score_type = $_POST['score_type'];

$score_raw = $_POST['score_raw'];

$episodes_watched = $_POST['episodes_watched'];

$nb_rewatched = $_POST['nb_rewatched'];

switch($action) {
	
	case 'add':
	    anilist_animelistManager::Instance()->AddAnime($series_id,$list_status,$score_type,$score_raw,$episodes_watched,$nb_rewatched);
	break;
	
	case 'update':

        anilist_animelistManager::Instance()->UpdateAnime($series_id,$list_status,$score_type,$score_raw,$episodes_watched,$nb_rewatched);
        anilist_connectionManager::Instance()->update('wp_anilist_animelist',array(
                'list_status' => $list_status,
                'score' => $score_raw,
                'episodes_watched' => $episodes_watched,
                'nb_rewatched' => $nb_rewatched

        ),
            array( 'series_id' => $series_id )
            );
	break;
	
	case 'delete':

	    anilist_animelistManager::Instance()->RemoveAnime($series_id);
        anilist_connectionManager::Instance()->delete('wp_anilist_characters',array(
                'series_id' => $series_id
            )
        );
        anilist_connectionManager::Instance()->delete('wp_anilist_staff',array(
                'series_id' => $series_id
            )
        );
	    anilist_connectionManager::Instance()->delete('wp_anilist_animelist',array(
	        'series_id' => $series_id
            )
        );

	break;
	
	default:
	break;
	
	
	
}




?>