<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Service;

use InvalidArgumentException;
use PragmaGoTech\Interview\CalculatorStrategy\CalculatorStrategyInterface;
use PragmaGoTech\Interview\Model\LoanProposal;
use PragmaGoTech\Interview\Resolver\TermFeeResolverInterface;
use PragmaGoTech\Interview\Validator\LoadProposalValidatorInterface;

class FeeCalculator implements FeeCalculatorInterface
{
    private CalculatorStrategyInterface $calculatorStrategy;

    public function __construct(
        protected LoadProposalValidatorInterface $validator,
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

        return ceil($fee / 5) * 5;
    }

    public function setCalculatorStrategy(CalculatorStrategyInterface $calculatorStrategy): void
    {
        $this->calculatorStrategy = $calculatorStrategy;
    }
}
