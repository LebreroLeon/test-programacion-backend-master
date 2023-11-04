<?php

namespace Hoyvoy\Currencies\Presentation\Controller;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
use Hoyvoy\Currencies\Application\Command\ConvertCurrencyCommand;
use Hoyvoy\Currencies\Application\Command\UpdateCurrencyRatesCommand;

class CurrencyCommandController
{
    public function updateCurrencyRates(Request $request)
    {
        Artisan::call('currency:update-rates');
    }
}
