<?php

namespace Hoyvoy\Currencies\Infrastructure;

use Hoyvoy\Currencies\Domain\CurrencyRepositoryInterface;
use Hoyvoy\Currencies\Domain\Currency;

class EloquentCurrencyRepository implements CurrencyRepositoryInterface
{
    public function findAllCurrencies(): array
    {
        return Currency::all()->toArray();
    }

    public function findCurrencyByCode(string $code): ?Currency
    {
        return Currency::where('code', $code)->first();
    }

    public function updateCurrencyRate(string $code, float $newRate): void
    {
        $currency = Currency::where('code', $code)->first();

        if ($currency) {
            $currency->rate = $newRate;
            $currency->save();
        }
    }
}
