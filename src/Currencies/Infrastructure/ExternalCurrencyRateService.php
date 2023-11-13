<?php

namespace Hoyvoy\Currencies\Infrastructure;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ExternalCurrencyRateService
{
    public function getCurrencyRates()
    {
        $response = Http::get('http://data.fixer.io/api/latest', [
            'access_key' => 'afeaac921e69a4af55da3b8ae00bc3b1',
        ]);

        if ($response->successful()) {
            $currencyRates = $response->json()['rates'];
        } else {
            return response()->json(['error' => 'No se pudieron obtener las tasas de conversión']);
        }
        return $currencyRates;
    }
}
