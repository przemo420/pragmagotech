<?php

namespace PragmaGoTech\Interview\RoundingStrategy;

interface RoundingStrategyInterface
{
    public function round(float $amount): float;
}
