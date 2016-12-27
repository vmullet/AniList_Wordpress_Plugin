<?php

require_once ('anilist_person.class.php');
require_once ('anilist_staff.class.php');

class anilist_character extends anilist_person {

    private $character_id;

    private $actor;


    public function __construct($character_id,$name_first,$name_last,$img_lge,$role,$series_id,$actor_name_first,$actor_name_last,$actor_img_lge,$actor_language,$actor_role)
    {
        $this->staff_id = $character_id;
        parent::__construct($name_first,$name_last,$img_lge,$role,$series_id);
        $this->actor = new anilist_staff($actor_name_first,$actor_name_last,$actor_language,$actor_img_lge,$actor_role,$series_id);
    }

    /**
     * @return anilist_staff
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * @param anilist_staff $actor
     */
    public function setActor($actor)
    {
        $this->actor = $actor;
    }

    /**
     * @return mixed
     */
    public function getCharacterId()
    {
        return $this->character_id;
    }

    /**
     * @param mixed $staff_id
     */
    public function setStaffId($character_id)
    {
        $this->character_id = $character_id;
    }


}



?>