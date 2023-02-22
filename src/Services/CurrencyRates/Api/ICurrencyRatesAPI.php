<?php

namespace App\Services\CurrencyRates\Api;

interface ICurrencyRatesAPI
{

    /**
     * For specified currency, get buy and sell rates between given dates.
     */
    public function getCurrencyRatesBetween($currency, $startDate, $endDate);

}