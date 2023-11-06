<?php

namespace Hoyvoy\Currencies\Infrastructure;

use Hoyvoy\Currencies\Domain\Currency;
use Illuminate\Support\Facades\Storage;
use Hoyvoy\Currencies\Domain\CurrencyRepositoryInterface;

class JsonCurrencyRepository implements CurrencyRepositoryInterface
{
    protected $jsonPath = 'currencies.json';

    public function findAllCurrencies(): array
    {
        $jsonData = $this->getJsonData();
        return $jsonData['data'];
    }

    public function findCurrencyByCode(string $code): ?Currency
    {
        $jsonData = $this->getJsonData();
        $currencies = $jsonData['data'];

        foreach ($currencies as $currencyData) {
            if ($currencyData['code'] === $code) {
                return new Currency($currencyData['code'], $currencyData['name'], $currencyData['rate_USD']);
            }
        }

        return null;
    }

    public function updateCurrencyRate(string $code, float $newRate): void
    {
        $jsonData = $this->getJsonData();
        $currencies = $jsonData['data'];

        foreach ($currencies as &$currencyData) {
            if ($currencyData['code'] === $code) {
                $currencyData['rate_USD'] = number_format($newRate, 2, '.', '');
                break;
            }
        }

        $this->saveJsonData($jsonData);
    }

    protected function getJsonData(): array
    {
        $jsonContents = Storage::get($this->jsonPath);
        return json_decode($jsonContents, true);
    }

    protected function saveJsonData(array $data): void
    {
        $jsonContents = json_encode($data, JSON_PRETTY_PRINT);
        Storage::put($this->jsonPath, $jsonContents);
    }
}
