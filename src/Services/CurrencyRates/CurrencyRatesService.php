<?php

namespace App\Services\CurrencyRates;

use App\Services\CurrencyRates\Api\CurrencyRateAPIBadRequestException;
use App\Services\CurrencyRates\Api\CurrencyRateAPIException;
use App\Services\CurrencyRates\Api\ICurrencyRatesAPI;
use App\Services\CurrencyRates\Api\NBPApi;


/**
 * Performs operations on currency rates data retrieved from an API.
 */
class CurrencyRatesService
{

    /**
     * @var ICurrencyRatesAPI
     */
    private $api;

    public function __construct()
    {
        $this->api = new NBPApi();
    }

    /**
     * @return float|int
     * @throws CurrencyRateAPIException
     * @throws CurrencyRateAPIBadRequestException
     */
    public function getAverageBuyRateBetween($currency, $startDate, $endDate)
    {
        $data = $this->api->getCurrencyRatesBetween($currency, $startDate, $endDate);
        if($this->valid($data))
        {
            $sum = array_reduce($data, function ($acc, $row) {
                return $acc + $row->ask;
            }, 0);
            return $sum / count($data);
        }
        throw new CurrencyRateAPIException("API for currency rates did not return valid data.");
    }

    private function valid($data) : bool
    {
        return is_array($data) && count($data) > 0 && isset($data[0]->ask);
    }

}