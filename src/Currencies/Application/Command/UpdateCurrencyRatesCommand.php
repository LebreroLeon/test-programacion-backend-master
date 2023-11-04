<?php

namespace Hoyvoy\Currencies\Application\Command;

use Illuminate\Console\Command;
use Hoyvoy\Currencies\Domain\CurrencyUpdater;

class UpdateCurrencyRatesCommand extends Command
{
     protected $signature = 'currency:update-rates';

     protected $description = 'Actualizar las tasas de conversión de divisas';
 
     public function handle(CurrencyUpdater $currencyUpdater)
     {
         $currencyUpdater->updateCurrencyRates();
     }
}
