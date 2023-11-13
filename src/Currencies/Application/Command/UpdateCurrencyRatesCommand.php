<?php

namespace Hoyvoy\Currencies\Application\Command;

use Illuminate\Console\Command;
use Hoyvoy\Currencies\Domain\CurrencyUpdaterService;

class UpdateCurrencyRatesCommand extends Command
{
     protected $signature = 'currencies:update-rates';

     protected $description = 'Update currencies rates by symbol';
 
     public function handle(CurrencyUpdaterService $currencyUpdater)
     {
         $currencyUpdater->updateCurrencyRates();
         $this->info('¡Currencies Rates Updated!');
     }
}
