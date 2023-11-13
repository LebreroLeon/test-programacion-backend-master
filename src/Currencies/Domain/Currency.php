<?php

namespace Hoyvoy\Currencies\Domain;

use DateTime;

class Currency
{
    protected $code;
    protected $name;
    protected $rate;
    protected $lastUpdated;

    public function __construct(string $code, string $name, float $rate) {
        $this->code = $code;
        $this->name = $name;
        $this->rate = $rate;
        $this->lastUpdated = new DateTime();
    }

    public function getCode(): string {
        return $this->code;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getRate(): float {
        return $this->rate;
    }

    public function getLastUpdated(): DateTime {
        return $this->lastUpdated;
    }

    public function setRate(float $rate) {
        $this->rate = $rate;
        $this->lastUpdated = new DateTime();
    }
}
