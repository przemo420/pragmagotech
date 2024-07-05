<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Service;

use InvalidArgumentException;
use PragmaGoTech\Interview\CalculatorStrategy\CalculatorStrategyInterface;
use PragmaGoTech\Interview\Model\LoanProposal;
use PragmaGoTech\Interview\Resolver\TermFeeResolverInterface;
use PragmaGoTech\Interview\RoundingStrategy\RoundingStrategyInterface;
use PragmaGoTech\Interview\Validator\LoanProposalValidatorInterface;

class FeeCalculator implements FeeCalculatorInterface
{
    private CalculatorStrategyInterface $calculatorStrategy;
    private RoundingStrategyInterface   $roundingStrategy;

    public function __construct(
        protected LoanProposalValidatorInterface $validator,
        protected TermFeeResolverInterface       $resolver,
    )
    {
    }

    /**
     * @throws InvalidArgumentException
     */
    public function calculate(LoanProposal $application): float
    {
        $this->validator->validate($application);

        $amount = $application->getAmount();
        $term   = $application->getTerm();

        $termResolved = $this->resolver->resolve($term);
        $fees         = $termResolved->getFees();

        $fee = $this->calculatorStrategy->calculate($amount, $fees);

        return $this->roundingStrategy->round($fee + $amount) - $amount;
    }

    public function setCalculatorStrategy(CalculatorStrategyInterface $calculatorStrategy): void
    {
        $this->calculatorStrategy = $calculatorStrategy;
    }

    public function setRoundingStrategy(RoundingStrategyInterface $roundingStrategy): void
    {
        $this->roundingStrategy = $roundingStrategy;
    }
}
