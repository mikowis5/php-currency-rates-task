<?php

namespace App\Http\Requests;

use App\Http\Requests\RestRequest;

class CurrencyRatesRequest extends RestRequest
{

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $dateFrom;

    /**
     * @var string
     */
    private $dateTo;

    protected $rules = [
        'currency' => 'required|in:USD,EUR,CHF,GBP',
        'dateFrom' => 'required|date',
        'dateTo' => 'required|date'
    ];

    public function __construct($currency, $dateFrom, $dateTo)
    {
        parent::__construct();
        $this->currency = $currency;
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
    }

    protected function getInputs(): array
    {
        return [
            'currency' => $this->currency,
            'dateFrom' => $this->dateFrom,
            'dateTo' => $this->dateTo
        ];
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @param string $dateFrom
     */
    public function setDateFrom(string $dateFrom): void
    {
        $this->dateFrom = $dateFrom;
    }

    /**
     * @param string $dateTo
     */
    public function setDateTo(string $dateTo): void
    {
        $this->dateTo = $dateTo;
    }



}