<?php

/**
 * This is part 2 of the php-dev-code-test. Don't read through this until geocode.php walk-through is complete
 * Goal: The GeoCodeLib class is refactored to be more easily readable and to meet modern coding standards
 */

//Reconstruct the geocode class with:
// 1. The API key being passed in the constructor
// 2. The API interaction broken into a separate method
// 3. Extra Credit - Caching implemented (as a class property for storing cached results)

$address = '4255 Bryant Irvin Road, Fort Worth, TX'; //The location of one of The Perfect Workout's studios in Fort Worth, TX
$apiKey = '677511b7e8e96111bd656d7ebe1d1e6ec1c156c'; //This is a live API key on a free account (rate limited on Geocod.io's free tier)

$geocode = new GeoCodeLib($apiKey);
$geocode->getCoordinatesOfAddress($address);
$geocodeResult = $geocode->getCoordinatesOfAddress($address);
print_r($geocodeResult);

class GeoCodeLib
{

    public string $geocodeioApiKey;
    public array $cache = [];

    public function getCoordinatesOfAddress($address)
    {

    }

    public function sendRequest($queryString, $useCache = true)
    {

    }
}
