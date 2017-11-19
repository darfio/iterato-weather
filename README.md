# Installation

````
$ cp .env.example .env
$ php artisan key:generate
$ composer install
````

Add Weather Providers:
App\Weather\Providers\YourWeatherProvider

Register Weather Provider:
App\Providers\WeatherServiceProvider