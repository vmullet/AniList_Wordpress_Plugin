<?php


include_once(dirname(__FILE__,2).'/managers/anilist_cacheManager.class.php');
include_once(dirname(__FILE__,2).'/managers/anilist_tokenManager.class.php');

function anilist_load_cache() {

    if (!anilist_tokenManager::Instance()->isTokenValid()) {

        $token = anilist_tokenManager::Instance()->options['anilist_token'];
        echo "Le token ".$token." n'est plus valide";

        anilist_tokenManager::Instance()->refreshToken();

        $token = anilist_tokenManager::Instance()->options['anilist_token'];
        echo 'Il a été remplacé par '.$token;

    }


anilist_cacheManager::Instance()->cacheProfile();
anilist_cacheManager::Instance()->cacheAnimeList();



}


?>