<?php

namespace App\Services\CurrencyRates\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * This class provides access to currency rates data from National Bank of Poland.
 * API documentation can be found on: https://api.nbp.pl/
 */
class NBPApi implements ICurrencyRatesAPI
{

    const BASE_URI = 'https://api.nbp.pl';

    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::BASE_URI
        ]);
    }

    /**
     * @param $url
     * @return mixed
     * @throws CurrencyRateAPIException
     * @throws CurrencyRateAPIBadRequestException
     */
    private function get($url)
    {
        try {
            $response = $this->client->get($url . "?format=JSON");
        } catch (GuzzleException $e) {
            switch ($e->getCode()) {
                case 400:
                    throw new CurrencyRateAPIBadRequestException($e->getMessage());
                default:
                    throw new CurrencyRateAPIException($e->getMessage());
            }
        }

        return json_decode($response->getBody()->getContents());
    }

    /**
     * @throws CurrencyRateAPIException
     * @throws CurrencyRateAPIBadRequestException
     */
    public function getCurrencyRatesBetween($currency, $startDate, $endDate)
    {
        $data = $this->get("/api/exchangerates/rates/c/{$currency}/{$startDate}/$endDate");
        return $data->rates ?? false;
    }

}