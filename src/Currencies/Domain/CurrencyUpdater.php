<?php

namespace Hoyvoy\Currencies\Domain;
use Hoyvoy\Currencies\Domain\CurrencyRepositoryInterface;
use Hoyvoy\Currencies\Infrastructure\ExternalCurrencyService;

class CurrencyUpdater
{
    protected $externalCurrencyService;
    protected $currencyRepository;

    public function __construct(ExternalCurrencyService $externalCurrencyService, CurrencyRepositoryInterface $currencyRepository) {
        $this->externalCurrencyService = $externalCurrencyService;
        $this->currencyRepository = $currencyRepository;
    }

    public function updateCurrencyRates() {
        $currencyRates = $this->externalCurrencyService->getCurrencyRates();
        
        foreach ($currencyRates as $code => $rate) {
            $this->currencyRepository->updateCurrencyRate($code, $rate);
        }
    }
}
