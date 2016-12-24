<?php

include_once(dirname(__FILE__,2).'/managers/anilist_connectionManager.class.php');

class anilist_animelist{

private static $instance = null;

private function __construct() {}

public static function Instance() {

    if (!isset(self::$instance)) {

        self::$instance = new anilist_animelist();
    }

    return self::$instance;

}


public function LoadAnimeList() {



}



}


?>