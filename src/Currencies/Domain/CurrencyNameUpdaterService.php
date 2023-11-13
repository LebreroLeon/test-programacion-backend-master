<?php

namespace Hoyvoy\Currencies\Domain;
use Hoyvoy\Currencies\Domain\CurrencyRepositoryInterface;
use Hoyvoy\Currencies\Infrastructure\ExternalCurrencyNameService;

class CurrencyNameUpdaterService
{
    protected $externalCurrencyNameService;
    protected $currencyRepository;

    public function __construct(
        ExternalCurrencyNameService $externalCurrencyNameService,
        CurrencyRepositoryInterface $currencyRepository
    ) {
        $this->externalCurrencyNameService = $externalCurrencyNameService;
        $this->currencyRepository = $currencyRepository;
    }

    public function updateCurrencyName()
    {
        $currencyNames = $this->externalCurrencyNameService->getCurrencyNames();

        foreach ($currencyNames as $code => $name) {
            $this->currencyRepository->updateCurrencyName($code, $name);
        }
    }
}
