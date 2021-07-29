<?php

namespace App\Service;

use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AddressApi 
{
   private $client;
   private $slugger;
   private $ApiUrl = 'https://api-adresse.data.gouv.fr/search/?q=';

   public function __construct(HttpClientInterface $client, SluggerInterface $slugger)
   {
      $this->client = $client;
      $this->slugger = $slugger;
   }

   /**
    * Method to get the gps coordinates of an angel
    *
    * @param [type] $city
    * @param [type] $zipCode
    * @return void
    */
   public function getCoordinatesWithAddress ($city, $zipCode)
   {
      // We slug the city name
      $citySlug = $this->slugger->slug($city);
      // client do the request
      $response = $this->client->request('GET', $this->ApiUrl.$citySlug.'&postcode='.$zipCode);

      return $response->toArray();
   }
}