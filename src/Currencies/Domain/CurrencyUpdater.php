<?php

namespace Hoyvoy\Currencies\Domain;
use Hoyvoy\Currencies\Infrastructure\ExternalCurrencyService;

class CurrencyUpdater
{
    protected $externalCurrencyService;

    public function __construct(ExternalCurrencyService $externalCurrencyService)
    {
        $this->externalCurrencyService = $externalCurrencyService;
    }

    public function updateCurrencyRates()
    {
        $currencyRates = $this->externalCurrencyService->getCurrencyRates();
        // TODO: updatear en la base de datos con las nuevas rates
        // Currency::update($currencyRates);
        return response()->json($currencyRates);
    }
}
