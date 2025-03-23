<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class CatalogueServices
{
    /**
     * Create a new class instance.
     */
    private $client;

    public function __construct()
    {
        //
        // Retrieve the API key from configuration
        $apiKey = config('services.api.acron_api_key');
        $this->client = new Client([
            'base_uri' => config('services.api.base_url'),
            'headers'  => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Accept'        => 'application/json',
            ]
        ]);
    }
    /**
     * Fetch catalogue content using Guzzle.
     *
     * @return array
     * @throws \Exception
     */
    public function fetchContent()
    {
        try {
            $tenancyId = config('services.api.tenancy_id', '3');
            $catalogueApiPath = config('services.api.external_api_path');
            $perPage = config('services.api.perPage', 12);

            // Append tenancy ID to the API path
            $endpoint = $catalogueApiPath . "$tenancyId";

            // Send a GET request with a query parameter
            $response = $this->client->request('GET', $endpoint, [
                'query' => ['perPage' => $perPage]
            ]);


            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Failed to decode JSON: ' . json_last_error_msg());
            }
            if (!isset($data['data']['items'])) {
                throw new \Exception('Unexpected API response format.');
            }
            return $data['data']['items'];
        } catch (RequestException $e) {
            // Wrap and rethrow exceptions as needed
            throw new \Exception('API request failed: ' . $e->getMessage());
        }
    }
}
