<?php
namespace App\Weather\Providers;

use App\Weather\Weather;

class OpenWeatherServiceProvider implements Weather
{
	private $api_key;
	private $city;

	public function __construct(){
		//
	}

	public function config($api_key, $city){
		$this->api_key = $api_key;
		$this->city = $city;		
	}
	
	function getWeather()
	{
	    $api_call = "http://api.openweathermap.org/data/2.5/weather?q={$this->city}&units=metric&appid={$this->api_key}";
		
	    // Make call with cURL
	    $session = curl_init($api_call);
	    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	    $response_json = curl_exec($session);
			
		return $response_json; 
	}
}