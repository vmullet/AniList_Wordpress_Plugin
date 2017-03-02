<?php

/**
 * Class anilist_optionManager
 * This class manages anilist plugin options
 */
class anilist_optionManager {

    protected static $instance = null;

    private $anilist_options = array();

    const ANILIST_OPTIONS = 'anilist_options';

    const ANILIST_USERNAME = 'anilist_username';
    const ANILIST_CLIENT_ID = 'anilist_client_id';
    const ANILIST_CLIENT_SECRET = 'anilist_client_secret';
    const ANILIST_TOKEN = 'anilist_token';
    const ANILIST_REFRESH_TOKEN = 'anilist_refresh_token';
    const ANILIST_LAST_CACHE_LOAD_START = 'anilist_last_cache_load_start';
    const ANILIST_LAST_CACHE_LOAD_END = 'anilist_last_cache_load_end';
    const ANILIST_IS_CACHING = 'anilist_caching';
    const ANILIST_VERSION = 'anilist_version';


    private function __construct()
    {
    }

    /**
     * @return anilist_optionManager
     */
    public static function Instance()
    {

        if (!(isset(self::$instance))) {

            self::$instance = new anilist_optionManager();
            self::$instance->load_options();
        }

        return self::$instance;

    }

    public function init_options() {

        if (!isset($this->anilist_options)) {
            $this->anilist_options[self::ANILIST_USERNAME] = '';
            $this->anilist_options[self::ANILIST_CLIENT_ID] = '';
            $this->anilist_options[self::ANILIST_CLIENT_SECRET] = '';
            $this->anilist_options[self::ANILIST_TOKEN] = '';
            $this->anilist_options[self::ANILIST_REFRESH_TOKEN] = '';
            $this->anilist_options[self::ANILIST_IS_CACHING] = false;
            $this->anilist_options[self::ANILIST_LAST_CACHE_LOAD_START] = '';
            $this->anilist_options[self::ANILIST_LAST_CACHE_LOAD_END] = '';
            $this->anilist_options[self::ANILIST_VERSION] = '1.0';

            add_option(self::ANILIST_OPTIONS,$this->anilist_options);
        }


    }

    public function erase_options() {

        if (isset($this->anilist_options)) {
            delete_option(self::ANILIST_OPTIONS);
            $this->anilist_options = null;
        }
    }

    public function load_options() {

        $this->anilist_options = get_option(self::ANILIST_OPTIONS);

    }

    public function are_options_valid() {

        if ($this->anilist_options[self::ANILIST_USERNAME] != ''
            &&$this->anilist_options[self::ANILIST_CLIENT_ID] != ''
            &&$this->anilist_options[self::ANILIST_CLIENT_SECRET] != ''
            &&$this->anilist_options[self::ANILIST_REFRESH_TOKEN] !='')
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function get_username() {

        return $this->anilist_options[self::ANILIST_USERNAME];
    }

    public function get_clientId() {

        return $this->anilist_options[self::ANILIST_CLIENT_ID];
    }

    public function get_client_secret() {

        return $this->anilist_options[self::ANILIST_CLIENT_SECRET];
    }

    public function get_token() {

        return $this->anilist_options[self::ANILIST_TOKEN];
    }

    public function get_refresh_token() {

        return $this->anilist_options[self::ANILIST_REFRESH_TOKEN];
    }

    public function get_last_cache_load_start() {

        return $this->anilist_options[self::ANILIST_LAST_CACHE_LOAD_START];
    }

    public function get_last_cache_load_end() {

        return $this->anilist_options[self::ANILIST_LAST_CACHE_LOAD_END];
    }

    public function get_is_caching() {

        return $this->anilist_options[self::ANILIST_IS_CACHING];
    }

    public function get_version() {

        return $this->anilist_options[self::ANILIST_VERSION];
    }


    public function set_username($username) {

        $this->anilist_options[self::ANILIST_USERNAME] = $username;
        update_option(self::ANILIST_OPTIONS,$this->anilist_options);
    }

    public function set_clientId($client_id) {

        $this->anilist_options[self::ANILIST_CLIENT_ID] = $client_id;
        update_option(self::ANILIST_OPTIONS,$this->anilist_options);
    }

    public function set_client_secret($client_secret) {

        $this->anilist_options[self::ANILIST_CLIENT_SECRET] = $client_secret;
        update_option(self::ANILIST_OPTIONS,$this->anilist_options);
    }

    public function set_token($token) {

        $this->anilist_options[self::ANILIST_TOKEN] = $token;
        update_option(self::ANILIST_OPTIONS,$this->anilist_options);
    }

    public function set_refresh_token($refresh_token) {

        $this->anilist_options[self::ANILIST_REFRESH_TOKEN] = $refresh_token;
        update_option(self::ANILIST_OPTIONS,$this->anilist_options);
    }

    public function set_last_cache_load_start($last_cache_load_start) {

        $this->anilist_options[self::ANILIST_LAST_CACHE_LOAD_START] = $last_cache_load_start;
        update_option(self::ANILIST_OPTIONS,$this->anilist_options);
    }

    public function set_last_cache_load_end($last_cache_load_end) {

        $this->anilist_options[self::ANILIST_LAST_CACHE_LOAD_END] = $last_cache_load_end;
        update_option(self::ANILIST_OPTIONS,$this->anilist_options);
    }

    public function set_is_caching($is_caching) {

        $this->anilist_options[self::ANILIST_IS_CACHING] = $is_caching;
        update_option(self::ANILIST_OPTIONS,$this->anilist_options);
    }

    public function set_version($version) {

        $this->anilist_options[self::ANILIST_VERSION] = $version;
        update_option(self::ANILIST_OPTIONS,$this->anilist_options);
    }






}

