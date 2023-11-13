<?php

namespace Hoyvoy\Currencies\Domain;

use Hoyvoy\Currencies\Infrastructure\ExternalCurrencyRateService;
use Hoyvoy\Currencies\Infrastructure\JsonCurrencyRepository;

class CurrencyConversionService
{
    protected $jsonCurrencyRepository;

    public function __construct(JsonCurrencyRepository $jsonCurrencyRepository)
    {
        $this->jsonCurrencyRepository = $jsonCurrencyRepository;
    }

    public function convertRatesToUSD(array $currencyRates): array
    {
        // Obtén la tasa actual de USD
        $usdRate = $this->jsonCurrencyRepository->getUSDRate();

        // Convierte las tasas de cambio a USD
        foreach ($currencyRates as &$currencyRate) {
            $currencyRate['rate_USD'] = number_format($currencyRate['rate'] / $usdRate, 2, '.', '');
        }

        return $currencyRates;
    }
}