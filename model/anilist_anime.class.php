<?php

class anilist_anime {

    private $series_id;
    private $list_status;
    private $score;
    private $episodes_watched;
    private $notes;
    private $started_on;
    private $finished_on;
    private $added_time;
    private $updated_time;
    private $anime_title_romaji;
    private $anime_title_english;
    private $anime_title_japanese;
    private $description;
    private $anime_type;
    private $season;
    private $start_date_airing;
    private $end_date_airing;
    private $genres;
    private $studio_name;
    private $average_score;
    private $img_lge;
    private $img_banner;
    private $total_episodes;
    private $airing_status;
    private $popularity;
    private $adult;

    /**
     * anilist_anime constructor.
     * @param $series_id
     * @param $list_status
     * @param $score
     * @param $episodes_watched
     * @param $notes
     * @param $started_on
     * @param $finished_on
     * @param $added_time
     * @param $updated_time
     * @param $anime_title_romaji
     * @param $anime_title_english
     * @param $anime_title_japanese
     * @param $description
     * @param $anime_type
     * @param $start_date_airing
     * @param $end_date_airing
     * @param $genres
     * @param $studio_name
     * @param $average_score
     * @param $img_lge
     * @param $img_banner
     * @param $total_episodes
     * @param $airing_status
     * @param $popularity
     * @param $adult
     */
    public function __construct($series_id, $list_status, $score, $episodes_watched, $notes, $started_on, $finished_on, $added_time, $updated_time, $anime_title_romaji, $anime_title_english, $anime_title_japanese, $description, $anime_type, $season, $start_date_airing, $end_date_airing, $genres, $studio_name, $average_score, $img_lge, $img_banner, $total_episodes, $airing_status, $popularity, $adult)
    {
        $this->series_id = $series_id;
        $this->list_status = $list_status;
        $this->score = $score;
        $this->episodes_watched = $episodes_watched;
        $this->notes = $notes;
        $this->started_on = $started_on;
        $this->finished_on = $finished_on;
        $this->added_time = $added_time;
        $this->updated_time = $updated_time;
        $this->anime_title_romaji = $anime_title_romaji;
        $this->anime_title_english = $anime_title_english;
        $this->anime_title_japanese = $anime_title_japanese;
        $this->description = $description;
        $this->anime_type = $anime_type;
        $this->season = $season;
        $this->start_date_airing = $start_date_airing;
        $this->end_date_airing = $end_date_airing;
        $this->genres = $genres;
        $this->studio_name = $studio_name;
        $this->average_score = $average_score;
        $this->img_lge = $img_lge;
        $this->img_banner = $img_banner;
        $this->total_episodes = $total_episodes;
        $this->airing_status = $airing_status;
        $this->popularity = $popularity;
        $this->adult = $adult;
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

    /**
     * @return mixed
     */
    public function getListStatus()
    {
        return $this->list_status;
    }

    /**
     * @param mixed $list_status
     */
    public function setListStatus($list_status)
    {
        $this->list_status = $list_status;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param mixed $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return mixed
     */
    public function getEpisodesWatched()
    {
        return $this->episodes_watched;
    }

    /**
     * @param mixed $episodes_watched
     */
    public function setEpisodesWatched($episodes_watched)
    {
        $this->episodes_watched = $episodes_watched;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getStartedOn()
    {
        return $this->started_on;
    }

    /**
     * @param mixed $started_on
     */
    public function setStartedOn($started_on)
    {
        $this->started_on = $started_on;
    }

    /**
     * @return mixed
     */
    public function getFinishedOn()
    {
        return $this->finished_on;
    }

    /**
     * @param mixed $finished_on
     */
    public function setFinishedOn($finished_on)
    {
        $this->finished_on = $finished_on;
    }

    /**
     * @return mixed
     */
    public function getAddedTime()
    {
        return $this->added_time;
    }

    /**
     * @param mixed $added_time
     */
    public function setAddedTime($added_time)
    {
        $this->added_time = $added_time;
    }

    /**
     * @return mixed
     */
    public function getUpdatedTime()
    {
        return $this->updated_time;
    }

    /**
     * @param mixed $updated_time
     */
    public function setUpdatedTime($updated_time)
    {
        $this->updated_time = $updated_time;
    }

    /**
     * @return mixed
     */
    public function getAnimeTitleRomaji()
    {
        return $this->anime_title_romaji;
    }

    /**
     * @param mixed $anime_title_romaji
     */
    public function setAnimeTitleRomaji($anime_title_romaji)
    {
        $this->anime_title_romaji = $anime_title_romaji;
    }

    /**
     * @return mixed
     */
    public function getAnimeTitleEnglish()
    {
        return $this->anime_title_english;
    }

    /**
     * @param mixed $anime_title_english
     */
    public function setAnimeTitleEnglish($anime_title_english)
    {
        $this->anime_title_english = $anime_title_english;
    }

    /**
     * @return mixed
     */
    public function getAnimeTitleJapanese()
    {
        return $this->anime_title_japanese;
    }

    /**
     * @param mixed $anime_title_japanese
     */
    public function setAnimeTitleJapanese($anime_title_japanese)
    {
        $this->anime_title_japanese = $anime_title_japanese;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getAnimeType()
    {
        return $this->anime_type;
    }

    /**
     * @param mixed $anime_type
     */
    public function setAnimeType($anime_type)
    {
        $this->anime_type = $anime_type;
    }

    /**
     * @return mixed
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * @param mixed $season
     */
    public function setSeason($season)
    {
        $this->season = $season;
    }



    /**
     * @return mixed
     */
    public function getStartDateAiring()
    {
        return $this->start_date_airing;
    }

    /**
     * @param mixed $start_date_airing
     */
    public function setStartDateAiring($start_date_airing)
    {
        $this->start_date_airing = $start_date_airing;
    }

    /**
     * @return mixed
     */
    public function getEndDateAiring()
    {
        return $this->end_date_airing;
    }

    /**
     * @param mixed $end_date_airing
     */
    public function setEndDateAiring($end_date_airing)
    {
        $this->end_date_airing = $end_date_airing;
    }

    /**
     * @return mixed
     */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * @param mixed $genres
     */
    public function setGenres($genres)
    {
        $this->genres = $genres;
    }

    /**
     * @return mixed
     */
    public function getStudioName()
    {
        return $this->studio_name;
    }

    /**
     * @param mixed $studio_name
     */
    public function setStudioName($studio_name)
    {
        $this->studio_name = $studio_name;
    }

    /**
     * @return mixed
     */
    public function getAverageScore()
    {
        return $this->average_score;
    }

    /**
     * @param mixed $average_score
     */
    public function setAverageScore($average_score)
    {
        $this->average_score = $average_score;
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
    public function getImgBanner()
    {
        return $this->img_banner;
    }

    /**
     * @param mixed $img_banner
     */
    public function setImgBanner($img_banner)
    {
        $this->img_banner = $img_banner;
    }

    /**
     * @return mixed
     */
    public function getTotalEpisodes()
    {
        return $this->total_episodes;
    }

    /**
     * @param mixed $total_episodes
     */
    public function setTotalEpisodes($total_episodes)
    {
        $this->total_episodes = $total_episodes;
    }

    /**
     * @return mixed
     */
    public function getAiringStatus()
    {
        return $this->airing_status;
    }

    /**
     * @param mixed $airing_status
     */
    public function setAiringStatus($airing_status)
    {
        $this->airing_status = $airing_status;
    }

    /**
     * @return mixed
     */
    public function getPopularity()
    {
        return $this->popularity;
    }

    /**
     * @param mixed $popularity
     */
    public function setPopularity($popularity)
    {
        $this->popularity = $popularity;
    }

    /**
     * @return mixed
     */
    public function getAdult()
    {
        return $this->adult;
    }

    /**
     * @param mixed $adult
     */
    public function setAdult($adult)
    {
        $this->adult = $adult;
    }



}


?>