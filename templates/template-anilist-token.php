<?php

devfolio_optionManager::Instance()->load_options();

if (anilist_optionManager::Instance()->are_options_valid()) {

    set_time_limit(0);

    devfolio_optionManager::Instance()->set_is_caching(true);

    anilist_optionManager::Instance()->set_last_cache_load_start(date('d-m-Y H:i:s'));


    if (!anilist_tokenManager::Instance()->isTokenValid()) {

        $token = anilist_optionManager::Instance()->get_token();
        echo "The token " . $token . " is not valid";

        anilist_tokenManager::Instance()->refreshToken();

        $token = anilist_optionManager::Instance()->get_token();
        echo 'It was replaced by ' . $token;

    }


    anilist_cacheManager::Instance()->cacheProfile();

    anilist_cacheManager::Instance()->cacheAnimeList();

    anilist_optionManager::Instance()->set_last_cache_load_end(date('d-m-Y H:i:s'));

    devfolio_optionManager::Instance()->set_is_caching(false);

}
else
{
    echo 'Missing options. Please check anilist plugin settings :(';
}


?>