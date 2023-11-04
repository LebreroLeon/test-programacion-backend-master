<?php

namespace Hoyvoy\Currencies\Presentation\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Hoyvoy\Currencies\Application\Query\GetCurrenciesQuery;
use Hoyvoy\Currencies\Application\Query\ConvertCurrencyQuery;
use Hoyvoy\Currencies\Infrastructure\ExternalCurrencyService;

class CurrencyQueryController
{
    private $externalCurrencyService;

    public function __construct(ExternalCurrencyService $externalCurrencyService)
    {
        $this->externalCurrencyService = $externalCurrencyService;
    }
}
