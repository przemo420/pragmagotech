<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Service;

use PragmaGoTech\Interview\CalculatorStrategy\CalculatorStrategyInterface;
use PragmaGoTech\Interview\Model\LoanProposal;

interface FeeCalculatorInterface
{
    /**
     * @return float The calculated total fee.
     */
    public function calculate(LoanProposal $application): float;

    public function setCalculatorStrategy(CalculatorStrategyInterface $calculatorStrategy);
}
