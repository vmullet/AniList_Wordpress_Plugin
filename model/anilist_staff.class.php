<?php

require_once ('anilist_person.class.php');

class anilist_staff extends anilist_person {


    private $language;

    public function __construct($name_first,$name_last,$language,$img_lge,$role,$series_id)
    {
        $this->language = $language;
        parent::__construct($name_first,$name_last,$img_lge,$role,$series_id);

    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }




}




?>