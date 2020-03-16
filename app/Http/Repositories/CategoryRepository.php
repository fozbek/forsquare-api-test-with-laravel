<?php

namespace App\Http\Repositories;

use App\Http\Helpers\HttpClientHelper;

class CategoryRepository
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

    public function getAllCategories()
    {
        $response = $this->sendRequest('venues/categories');
        $categoriesResponse = json_decode($response->getBody()->getContents(), true);
        return $categoriesResponse['response']['categories'];
    }
}
