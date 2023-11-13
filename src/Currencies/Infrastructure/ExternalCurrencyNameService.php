<?php

namespace Hoyvoy\Currencies\Infrastructure;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ExternalCurrencyNameService
{
    public function getCurrencyNames()
    {
        $response = Http::get('http://data.fixer.io/api/symbols', [
            'access_key' => 'afeaac921e69a4af55da3b8ae00bc3b1',
        ]);

        if ($response->successful()) {
            $currencyNames = $response->json()['symbols'];
        } else {
            return response()->json(['error' => 'No se pudieron obtener los símbolos de las divisas']);
        }
        return $currencyNames;
    }
}
