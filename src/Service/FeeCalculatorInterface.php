<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Service;

use PragmaGoTech\Interview\CalculatorStrategy\CalculatorStrategyInterface;
use PragmaGoTech\Interview\Model\LoanProposal;
use PragmaGoTech\Interview\RoundingStrategy\RoundingStrategyInterface;

interface FeeCalculatorInterface
{
    /**
     * @return float The calculated total fee.
     */
    public function calculate(LoanProposal $application): float;

    public function setCalculatorStrategy(CalculatorStrategyInterface $calculatorStrategy);
    public function setRoundingStrategy(RoundingStrategyInterface $roundingStrategy);
}
