<?php

class anilist_tokenManager {

    private static $instance = null;


    private function __construct() {
    }


    public static function Instance() {

        if (!isset(self::$instance)) {

            self::$instance = new anilist_tokenManager();

        }

        return self::$instance;

    }

    public function isTokenValid() {

        if (anilist_optionManager::Instance()->get_token()=='') {
            return false;
        }
        else {
            $response_code = anilist_queryManager::Instance()->getStatusCode('https://anilist.co/api/user/' . anilist_optionManager::Instance()->get_username() . '?access_token=' . anilist_optionManager::Instance()->get_token());

            if ($response_code != '200')
                return false;
            else
                return true;
        }
    }


    public function refreshToken() {

        $response = anilist_queryManager::Instance()->post('https://anilist.co/api/auth/access_token?grant_type=refresh_token&client_id='.anilist_optionManager::Instance()->get_clientId().'&client_secret='.anilist_optionManager::Instance()->get_client_secret().'&refresh_token='.anilist_optionManager::Instance()->get_refresh_token(),array(),true);

        anilist_optionManager::Instance()->set_token($response['access_token']);


    }


}



?>