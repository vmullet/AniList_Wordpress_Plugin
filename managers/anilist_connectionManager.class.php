<?php


class anilist_connectionManager {

    protected static $instance = null;


    private function __construct() {
    }

    public static function Instance() {

        if (!(isset(self::$instance))) {

            self::$instance = new anilist_connectionManager();
        }

        return self::$instance;

    }

    public function select($sql) {

        global $wpdb;

        $myrows = $wpdb->get_results($sql,ARRAY_A);
        return $myrows;


    }



    public function insert($table_name,$values) {


        global $wpdb;
        $result = $wpdb->insert(
            $table_name,
            $values

        );

        return $result;

    }

    public function update($table_name, $values, $where)
    {


        global $wpdb;
        $result = $wpdb->update(
            $table_name,
            $values,
            $where

        );

        return $result;

    }

    public function delete($table_name,$values) {


        global $wpdb;
        $result = $wpdb->delete(
            $table_name,
            $values

        );

        return $result;
    }

    public function query($sql) {


        global $wpdb;
        $result = $wpdb->query($sql);

        return $result;
    }


}

?>