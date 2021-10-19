<?php

/**
 * This class is functional. If you run the file via CLI, you get a readout of the given coordinates.
 * Goal: The GeoCodeLib class is refactored to be more easily readable and to meet modern coding standards
 */

$address = '4255 Bryant Irvin Road, Fort Worth, TX'; //The location of one of The Perfect Workout's studios in Fort Worth, TX
$apiKey = '677511b7e8e96111bd656d7ebe1d1e6ec1c156c'; //This is a live API key on a free account (rate limited on Geocod.io's free tier)

$geocode = new GeoCodeLib();
$geocode->geocodeioApiKey = $apiKey;
$geocodeResult = $geocode->getCoordinatesOfAddress($address);
print_r($geocodeResult);

class GeoCodeLib
{

    public $geocodeioApiKey;

    public function getCoordinatesOfAddress($address)
    {
        if (trim($address) == '') {return false;}
        $queryString = trim($address);

        $curl = curl_init('https://api.geocod.io/v1.4/geocode?q=' . urlencode($queryString) . '&api_key=' . $this->geocodeioApiKey . '&limit=1');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        $info = curl_getinfo($curl);
        curl_close($curl);

        $response = json_decode($result, true);

        $coordinates = ['lat' => empty($response['results'][0]['location']['lat']) ? null : $response['results'][0]['location']['lat'], 'long' => empty($response['results'][0]['location']['lng']) ? null : $response['results'][0]['location']['lng'],];

        return $coordinates;
    }
}
