<?php

namespace PragmaGoTech\Interview\CalculatorStrategy;

interface CalculatorStrategyInterface
{
    public function calculate(float $amount, array $fees): float;
}
