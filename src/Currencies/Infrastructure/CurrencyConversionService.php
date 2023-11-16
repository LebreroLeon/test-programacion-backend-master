<?php

namespace Hoyvoy\Currencies\Infrastructure;

class CurrencyConversionService
{
    //Dado que la api (free) nos obliga a trabajar con rate_EUR
    //convertimos todos los rates a rate_USD
    public function convertRatesToUSD(array $currencyRates): array
    {
        $usdRate = $currencyRates['USD'];

        foreach ($currencyRates as $currencyCode => &$currencyRate) {
            $convertedRate = $currencyRate / $usdRate;
            $currencyRates[$currencyCode] = number_format($convertedRate, 6, '.', '');
        }

        return $currencyRates;
    }
}