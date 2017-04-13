<?php

abstract class anilist_person {

    protected $name_first;
    protected $name_last;
    protected $img_lge;
    protected $role;
    protected $series_id;

    protected function __construct($name_first,$name_last,$img_lge,$role,$series_id)
    {
        $this->name_first = $name_first;
        $this->name_last = $name_last;
        $this->img_lge = $img_lge;
        $this->role = $role;
        $this->series_id = $series_id;
    }

    /**
     * @return mixed
     */
    public function getNameFirst()
    {
        return $this->name_first;
    }

    /**
     * @param mixed $name_first
     */
    public function setNameFirst($name_first)
    {
        $this->name_first = $name_first;
    }

    /**
     * @return mixed
     */
    public function getNameLast()
    {
        return $this->name_last;
    }

    /**
     * @param mixed $name_last
     */
    public function setNameLast($name_last)
    {
        $this->name_last = $name_last;
    }

    /**
     * @return mixed
     */
    public function getImgLge()
    {
        return $this->img_lge;
    }

    /**
     * @param mixed $img_lge
     */
    public function setImgLge($img_lge)
    {
        $this->img_lge = $img_lge;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getSeriesId()
    {
        return $this->series_id;
    }

    /**
     * @param mixed $series_id
     */
    public function setSeriesId($series_id)
    {
        $this->series_id = $series_id;
    }

}


?>