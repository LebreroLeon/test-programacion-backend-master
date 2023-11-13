<?php

namespace Hoyvoy\Currencies\Domain;
use Hoyvoy\Currencies\Infrastructure\CurrencyConversionService;
use Hoyvoy\Currencies\Domain\CurrencyRepositoryInterface;
use Hoyvoy\Currencies\Infrastructure\ExternalCurrencyRateService;

class CurrencyUpdaterService
{
    protected $externalCurrencyRateService;
    protected $currencyRepository;
    protected $currencyConversionService;

    public function __construct(
            ExternalCurrencyRateService $externalCurrencyRateService, 
            CurrencyRepositoryInterface $currencyRepository,
            CurrencyConversionService $currencyConversionService
            ) {
        $this->externalCurrencyRateService = $externalCurrencyRateService;
        $this->currencyRepository = $currencyRepository;
        $this->currencyConversionService = $currencyConversionService;
    }

    public function updateCurrencyRates() {
        $currencyRates = $this->externalCurrencyRateService->getCurrencyRates();
        $convertedRates = $this->currencyConversionService->convertRatesToUSD($currencyRates);
        
        foreach ($convertedRates as $code => $rate) {
            $this->currencyRepository->updateCurrencyRate($code, $rate);
        }
    }
}
