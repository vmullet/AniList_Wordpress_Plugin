<?php

class anilist_profile{

private static $instance = null;

private $id;
private $username;
private $anime_time;
private $avatar;
private $description;
private $nb_anime_watching;
private $nb_anime_plan_watch;
private $nb_anime_completed;
private $nb_anime_dropped;
private $nb_anime_onhold;
private $nb_anime_total;
private $nb_episodes_total;
private $nb_duration_total;


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
	$this->description = $profile[0]['description'];
    $this->nb_anime_watching = $profile[0]['nb_anime_watching'];
    $this->nb_anime_plan_watch = $profile[0]['nb_anime_plan_watch'];
    $this->nb_anime_completed = $profile[0]['nb_anime_completed'];
    $this->nb_anime_dropped = $profile[0]['nb_anime_dropped'];
    $this->nb_anime_onhold = $profile[0]['nb_anime_onhold'];
    $this->nb_anime_total = $profile[0]['nb_anime_total'];
	$this->nb_episodes_total = $profile[0]['nb_episodes_total'];
	$this->nb_duration_total = $profile[0]['nb_duration_total'];

}

public function getId() { return $this->id; }

public function getUsername() { return $this->username; }

public function getAnimeTime() { return $this->anime_time; }

public function getAvatar() { return $this->avatar; }

public function getDescription() { return $this->description; }

public function getNbAnimeWatching() {return $this->nb_anime_watching; }

public function getNbAnimePlanWatch() {return $this->nb_anime_plan_watch; }

public function getNbAnimeCompleted() {return $this->nb_anime_completed; }

public function getNbAnimeDropped() {return $this->nb_anime_dropped; }

public function getNbAnimeOnHold() {return $this->nb_anime_onhold; }

public function getNbAnimeTotal() {return $this-> nb_anime_total; }

public function getNbEpisodesTotal() {return $this-> nb_episodes_total; }

public function getNbDurationTotal() {return $this-> nb_duration_total; }

public function getNbDurationHour() {
	
	return intdiv($this->nb_duration_total,60).' hours '.($this->nb_duration_total%60).' minutes';
}

public function getNbDurationDay() {
	
	$days = intdiv($this->nb_duration_total,1440);
	$hours = intdiv($this->nb_duration_total,60) - ($days*24);
	$minutes = $this->nb_duration_total%60;
	
	return $days.' days '.$hours.' hours '.$minutes.' minutes';
	
}


}



?>