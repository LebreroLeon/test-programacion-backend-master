<?php

namespace Hoyvoy\Currencies\Domain;

interface CurrencyRepositoryInterface
{
    public function findAllCurrencies(): array;
    public function findCurrencyByCode(string $code): ?Currency;
    public function updateCurrencyRate(string $code, float $newRate): void;
}
