<?php

namespace Hoyvoy\Currencies\Infrastructure;

class CurrencyConversionService
{
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