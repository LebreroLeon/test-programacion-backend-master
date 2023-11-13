<?php

namespace Hoyvoy\Currencies\Domain;
use Hoyvoy\Currencies\Infrastructure\EmailService;
use Hoyvoy\Currencies\Domain\CurrencyRepositoryInterface;
use Hoyvoy\Currencies\Infrastructure\CurrencyConversionService;
use Hoyvoy\Currencies\Infrastructure\ExternalCurrencyRateService;

class CurrencyUpdaterService
{
    protected $externalCurrencyRateService;
    protected $currencyRepository;
    protected $currencyConversionService;
    protected $emailService;

    public function __construct(
            ExternalCurrencyRateService $externalCurrencyRateService, 
            CurrencyRepositoryInterface $currencyRepository,
            CurrencyConversionService $currencyConversionService,
            EmailService $emailService
            ) {
        $this->externalCurrencyRateService = $externalCurrencyRateService;
        $this->currencyRepository = $currencyRepository;
        $this->currencyConversionService = $currencyConversionService;
        $this->emailService = $emailService;
    }

    public function updateCurrencyRates() {
        $currencyRates = $this->externalCurrencyRateService->getCurrencyRates();
        $convertedRates = $this->currencyConversionService->convertRatesToUSD($currencyRates);
        
        foreach ($convertedRates as $code => $rate) {
            $this->currencyRepository->updateCurrencyRate($code, $rate);
        }
        $this->emailService->sendCurrencyUpdateMail();
    }
}
