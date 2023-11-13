<?php

namespace Hoyvoy\Currencies\Presentation\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Hoyvoy\Currencies\Application\Query\GetCurrenciesQuery;
use Hoyvoy\Currencies\Application\Query\ConvertCurrencyQuery;
use Hoyvoy\Currencies\Infrastructure\ExternalCurrencyRateService;

class CurrencyQueryController
{
    private $externalCurrencyRateService;

    public function __construct(ExternalCurrencyRateService $externalCurrencyRateService)
    {
        $this->externalCurrencyRateService = $externalCurrencyRateService;
    }


    //TODO qutiar el hardcode de la api y leer del json en el GetCurrenciesQuery.php
    public function getAllCurrencies()
    {
        $currencies = $this->externalCurrencyRateService->getCurrencyRates();

        foreach ($currencies as $key => $value){
            $formattedCurrencies[] = [
                'code' => $key,
                'rate' => $value,
            ];
        } 

        return response()->json(['data' => $formattedCurrencies]);
    }

}
