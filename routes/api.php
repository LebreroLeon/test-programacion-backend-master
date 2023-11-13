<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Example\ExampleGetController;
use Hoyvoy\Currencies\Presentation\Controller\CurrencyQueryController;
use Hoyvoy\Currencies\Presentation\Controller\CurrencyCommandController;


Route::get('/example', ExampleGetController::class);


Route::get('/currencies', [CurrencyQueryController::class, 'getAllCurrencies']);
// Route::get('/currencies/rate-conversion', [CurrencyQueryController::class, 'convertCurrency']);
// Route::post('/currencies/update-rates', [CurrencyCommandController::class, 'updateCurrencyRates']);