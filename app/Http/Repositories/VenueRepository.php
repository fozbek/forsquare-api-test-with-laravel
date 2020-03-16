<?php

namespace App\Http\Repositories;

use App\Http\Helpers\HttpClientHelper;

class VenueRepository
{
    private $httpClient;

    public function __construct()
    {
        $this->httpClient = HttpClientHelper::getAuthenticatedClient();
    }

    private function sendRequest(string $endpoint, array $queries = [])
    {
        $queries = array_merge($queries, $this->httpClient->getConfig('query'));
        return $this->httpClient->request('GET', $endpoint, [
            'verify' => false,
            'query' => $queries
        ]);
    }

    public function exploreVenues(string $categoryId)
    {
        $response = $this->sendRequest('venues/explore', [
            'near' => 'valletta', // Testing Purpose
            'categoryId' => $categoryId
        ]);
        $venueResponse = json_decode($response->getBody()->getContents(), true);
        return $venueResponse['response']['groups'][0]['items'];
    }
}
