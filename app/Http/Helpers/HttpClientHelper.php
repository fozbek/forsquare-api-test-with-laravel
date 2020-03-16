<?php

namespace App\Http\Helpers;

use GuzzleHttp\Client;

class HttpClientHelper
{
    public static function getAuthenticatedClient()
    {
        return new Client([
            'base_uri' => env('FOURSQUARE_URL'),
            'query' => [
                'client_id' => env('FOURSQUARE_CLIENT_ID'),
                'client_secret' => env('FOURSQUARE_CLIENT_SECRET'),
                'v' => '20201210'
            ],
        ]);
    }
}
