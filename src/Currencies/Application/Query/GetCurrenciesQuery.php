<?php

namespace Hoyvoy\Currencies\Application\Query;

use Illuminate\Support\Facades\Storage;

class GetCurrenciesQuery
{
    public function execute(): array
    {
        $jsonData = $this->getJsonData();
        return $jsonData['data'];
    }

    protected function getJsonData(): array
    {
        $jsonPath = 'currencies.json';
        if (Storage::exists($jsonPath)) {
            $jsonContents = Storage::get($jsonPath);
            return json_decode($jsonContents, true) ?: ['data' => []];
        }
    
        return ['data' => []];
    }
}
