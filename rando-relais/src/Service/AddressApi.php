<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class AddressApi 
{
   private $client;
   private $ApiUrl = 'https://api-adresse.data.gouv.fr/search/?q=';

   public function __construct(HttpClientInterface $client)
   {
      return $this->client = $client;
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
      // client do the request
      $response = $this->client->request('GET', $this->ApiUrl.$city.'&postcode='.$zipCode);

      return $response->toArray();
   }
}