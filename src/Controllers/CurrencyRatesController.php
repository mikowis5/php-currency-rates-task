<?php

namespace App\Controllers;

use App\Http\Requests\CurrencyRatesRequest;
use App\Http\Requests\RequestInvalidException;
use App\Http\Response\JsonBadRequestResponse;
use App\Http\Response\JsonErrorResponse;
use App\Http\Response\JsonResponse;
use App\Services\CurrencyRates\Api\CurrencyRateAPIBadRequestException;
use App\Services\CurrencyRates\Api\CurrencyRateAPIException;
use App\Services\CurrencyRates\CurrencyRatesService;

class CurrencyRatesController extends Controller
{

    /**
     * @var CurrencyRatesService
     */
    private $currencyRateService;


    public function __construct()
    {
        $this->currencyRateService = new CurrencyRatesService;
    }

    /**
     * [GET] /{currency}/{startDate}/{endDate}/
     */
    public function averageBuyRateBetweenDates($currency, $startDate, $endDate)
    {
        try {

            $request = new CurrencyRatesRequest($currency, $startDate, $endDate);
            $request->validate();

            $average = $this->currencyRateService->getAverageBuyRateBetween($currency, $startDate, $endDate);
            JsonResponse::output([ "average_price" => $average ]);

        } catch (RequestInvalidException $e) {
            JsonBadRequestResponse::output(['errors' => $e->errors]);
        } catch (CurrencyRateAPIBadRequestException $e) {
            JsonBadRequestResponse::output(['error' => $e->getMessage()]);
        } catch (CurrencyRateAPIException $e) {
            JsonErrorResponse::output(['error' => $e->getMessage()]);
        }
    }

}