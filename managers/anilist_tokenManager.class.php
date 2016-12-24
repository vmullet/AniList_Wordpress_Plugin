<?php

include_once('anilist_queryManager.class.php');


class anilist_tokenManager {

    private static $instance = null;
    public $options;


    private function __construct() {

        $this->options = get_option('anilist_options');
    }


    public static function Instance() {

        if (!isset(self::$instance)) {

            self::$instance = new anilist_tokenManager();

        }

        return self::$instance;

    }

    public function isTokenValid() {

        if ($this->options['anilist_token']=='') {
            return false;
        }
        else {
            $response_code = anilist_queryManager::Instance()->getStatusCode('https://anilist.co/api/user/' . $this->options['anilist_username'] . '?access_token=' . $this->options['anilist_token']);

            if ($response_code != '200')
                return false;
            else
                return true;
        }
    }


    public function refreshToken() {

        $response = anilist_queryManager::Instance()->post('https://anilist.co/api/auth/access_token?grant_type=refresh_token&client_id='.$this->options['anilist_client_id'].'&client_secret='.$this->options['anilist_client_secret'].'&refresh_token='.$this->options['anilist_refresh_token']);

        $this->options['anilist_token'] = $response['access_token'];
        update_option('anilist_options',$this->options);


    }


}



?>