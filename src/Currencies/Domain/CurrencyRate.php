<?php

namespace Hoyvoy\Currencies\Domain;

class CurrencyRate
{
    protected $baseCurrencyCode;
    protected $targetCurrencyCode;
    protected $rate;

    public function __construct(string $baseCurrencyCode, string $targetCurrencyCode, float $rate) {
        $this->baseCurrencyCode = $baseCurrencyCode;
        $this->targetCurrencyCode = $targetCurrencyCode;
        $this->rate = $rate;
    }

    public function getBaseCurrencyCode(): string {
        return $this->baseCurrencyCode;
    }

    public function getTargetCurrencyCode(): string {
        return $this->targetCurrencyCode;
    }

    public function getRate(): float {
        return $this->rate;
    }
}
