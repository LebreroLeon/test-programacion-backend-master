<?php

namespace Hoyvoy\Currencies\Domain;
use Hoyvoy\Currencies\Domain\CurrencyRepositoryInterface;
use Hoyvoy\Currencies\Infrastructure\ExternalCurrencyRateService;

class CurrencyUpdaterService
{
    protected $externalCurrencyRateService;
    protected $currencyRepository;

    public function __construct(
            ExternalCurrencyRateService $externalCurrencyRateService, 
            CurrencyRepositoryInterface $currencyRepository) {
        $this->externalCurrencyRateService = $externalCurrencyRateService;
        $this->currencyRepository = $currencyRepository;
    }

    public function updateCurrencyRates() {
        $currencyRates = $this->externalCurrencyRateService->getCurrencyRates();
        
        foreach ($currencyRates as $code => $rate) {
            $this->currencyRepository->updateCurrencyRate($code, $rate);
        }
    }
}
