<?php

use App\Http\Requests\RequestInvalidException;

class CurrencyRatesRequestValidationTest extends \PHPUnit\Framework\TestCase
{

    public function testIfValidRequestPasses() {
        $request = new \App\Http\Requests\CurrencyRatesRequest(
            'EUR',
            date('Y-m-d'),
            date('Y-m-d', strtotime('tomorrow'))
        );
        $this->assertTrue($request->validate());
    }

    public function testIfOnlyYmdFormatIsAllowed() {
        $this->expectException(RequestInvalidException::class);
        $request = new \App\Http\Requests\CurrencyRatesRequest(
            'EUR',
            date('d-m-Y'),
            date('d-m-Y', strtotime('tomorrow'))
        );
        $request->validate();
    }

    public function testIfUnsupportedCurrencyFails() {
        $this->expectException(RequestInvalidException::class);
        $request = new \App\Http\Requests\CurrencyRatesRequest(
            'PLN',
            date('Y-m-d'),
            date('Y-m-d', strtotime('tomorrow'))
        );
        $request->validate();
    }

}