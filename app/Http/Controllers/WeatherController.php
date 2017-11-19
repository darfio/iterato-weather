<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weather\Weather;

class WeatherController extends Controller
{
    public function index(){

    	return view('weather');
    }

    public function getWeather(Request $request, Weather $weather){

    	$weather->config( $request['api_key'], $request['city'] );
    	return $weather->getWeather();	
    }   
}
