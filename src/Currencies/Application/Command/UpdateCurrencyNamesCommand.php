<?php

namespace Hoyvoy\Currencies\Application\Command;

use Illuminate\Console\Command;
use Hoyvoy\Currencies\Domain\CurrencyNameUpdaterService;

class UpdateCurrencyNamesCommand extends Command
{
    protected $signature = 'currencies:update-names';

    protected $description = 'Update currencies names by symbol';

    public function handle(CurrencyNameUpdaterService $currencyNameUpdater)
    {
        $currencyNameUpdater->updateCurrencyName();
        $this->info('¡Currencies Names Updated!');
    }
}
