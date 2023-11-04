<?php

namespace Hoyvoy\Currencies\Infrastructure;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ExternalCurrencyService
{
    public function getCurrencyRates()
    {
        $cacheKey = 'currency_rates';
        $currencyRates = Cache::get($cacheKey);

        if (!$currencyRates) {
            $response = Http::get('http://data.fixer.io/api/latest', [
                'access_key' => 'afeaac921e69a4af55da3b8ae00bc3b1',
                //'base' => 'EUR', // La versión gratuita de fixer sólo permite el base EUR =(
            ]);

            if ($response->successful()) {
                $currencyRates = $response->json()['rates'];
                Cache::put($cacheKey, $currencyRates, 3600);
            } else {
                return response()->json(['error' => 'No se pudieron obtener las tasas de conversión']);
            }
        }

        return $currencyRates;
    }
}
