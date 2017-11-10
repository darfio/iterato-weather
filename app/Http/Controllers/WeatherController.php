<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weather\Providers\OpenWeatherServiceProvider;
use App\Weather\WeatherService;

class WeatherController extends Controller
{
    public function index(){

    	return view('weather');
    }

    public function getWeather(Request $request){

    	$weather_provider = new OpenWeatherServiceProvider($request['api_key'], $request['city']);
		$weather_service = new WeatherService($weather_provider);
		$weather = $weather_service->getWeather();

		return $weather;	
    }    
}
