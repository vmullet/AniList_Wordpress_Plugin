<?php

include_once(dirname(__FILE__,2).'/managers/anilist_connectionManager.class.php');

class anilist_profile{

private static $instance = null;

private $id;
private $username;
private $anime_time;
private $avatar;
private $nb_anime_watching;
private $nb_anime_plan_watch;
private $nb_anime_completed;
private $nb_anime_dropped;
private $nb_anime_onhold;


private function __construct() {}

public static function Instance() {

    if (!isset(self::$instance)) {

        self::$instance = new anilist_profile();
    }

    return self::$instance;

}

public function LoadProfile() {

    $profile = anilist_connectionManager::Instance()->select('Select * from wp_anilist_profile');

    $this->id = $profile[0]['id'];
    $this->username = $profile[0]['username'];
    $this->anime_time = $profile[0]['anime_time'];
    $this->avatar = $profile[0]['avatar'];
    $this->nb_anime_watching = $profile[0]['nb_anime_watching'];
    $this->nb_anime_plan_watch = $profile[0]['nb_anime_plan_watch'];
    $this->nb_anime_completed = $profile[0]['nb_anime_completed'];
    $this->nb_anime_dropped = $profile[0]['nb_anime_dropped'];
    $this->nb_anime_onhold = $profile[0]['nb_anime_onhold'];

}

public function Id() { return $this->id; }

public function Username() { return $this->username; }

public function AnimeTime() { return $this->anime_time; }

public function Avatar() { return $this->avatar; }

public function NbAnimeWatching() {return $this->nb_anime_watching; }

public function NbAnimePlanWatch() {return $this->nb_anime_plan_watch; }

public function NbAnimeCompleted() {return $this->nb_anime_completed; }

public function NbAnimeDropped() {return $this->nb_anime_dropped; }

public function NbAnimeOnHold() {return $this->nb_anime_onhold; }


}



?>