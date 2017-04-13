<?php


class anilist_queryManager {


private static $instance = null;


private function __construct() {}


public static function Instance() {

    if (!isset(self::$instance)) {

        self::$instance = new anilist_queryManager();
    }

    return self::$instance;

}

public function getBody($url) {

    $response = wp_remote_get($url);
    $response = wp_remote_retrieve_body($response);
    $response = json_decode($response,true);

    return $response;

}

public function getHeaders($url) {

        $response = wp_remote_get($url);
        $response = wp_remote_retrieve_headers($response);
        $response = json_decode($response,true);

        return $response;

}

public function getStatusCode($url) {

    $response = wp_remote_get($url);
    $code = wp_remote_retrieve_response_code($response);

    return $code;
}



public function post($url,$args,$decode) {

    $response = wp_remote_post($url,$args);
	
    $response = wp_remote_retrieve_body($response);
	if ($decode) {
		$response = json_decode($response,true);
	}
    
    return $response;
	
}

public function put($url,$args,$decode) {

	$args['method'] = 'PUT';
	
    $response = wp_remote_request($url,$args);
    $response = wp_remote_retrieve_body($response);
	if ($decode) {
    $response = json_decode($response,true);
	}

    return $response;

}

public function delete($url,$args,$decode) {
	
	$args['method'] = 'DELETE';
	
	$response = wp_remote_request($url,$args);
	$response = wp_remote_retrieve_body($response);
	
	if ($decode) {
		$response = json_decode($response,true);
	}
	
	return $response;
	
}

public function request($url,$method) {

    $response = wp_remote_request($url,array(

        'method' => $method
    ));
    $response = wp_remote_retrieve_body($response);
    $response = json_decode($response,true);

    return $response;

}


}



?>