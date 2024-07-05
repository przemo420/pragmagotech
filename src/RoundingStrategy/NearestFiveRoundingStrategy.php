<?php

namespace PragmaGoTech\Interview\RoundingStrategy;

use PragmaGoTech\Interview\Model\Term\FeeTermInterface;

class NearestFiveRoundingStrategy implements RoundingStrategyInterface
{
    public function round(float $amount): float
    {
        return ceil($amount / 5) * 5;
    }
}
