<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class WeatherApi
{
   private $apiUrl = 'http://api.openweathermap.org/data/2.5/weather?q=';
   private $apiKey = '2667120b5deee742009a5e9cbde95b6e';
   private $option = '&units=metric&lang=fr';
   private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getWeather(string $city)
    {
       $response = $this->client->request('GET', $this->apiUrl.$city.$this->option.'&appid='.$this->apiKey);
       
       return $response->toArray();
    }
}