<?php

namespace Hoyvoy\Currencies\Domain;

class Currency
{
    protected $code;
    protected $name;
    protected $rate;

    public function __construct(string $code, string $name, float $rate) {
        $this->code = $code;
        $this->name = $name;
        $this->rate = $rate;
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

    public function setRate(float $rate) {
        $this->rate = $rate;
    }
}
