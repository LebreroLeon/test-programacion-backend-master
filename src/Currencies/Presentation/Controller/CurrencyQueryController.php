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
    private $getCurrenciesQuery;

    public function __construct(GetCurrenciesQuery $getCurrenciesQuery)
    {
        $this->getCurrenciesQuery = $getCurrenciesQuery;
    }

    public function getAllCurrencies()
    {
        $currencies = $this->getCurrenciesQuery->execute();
        return response()->json(['data' => $currencies]);
    }

}
