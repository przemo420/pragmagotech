<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview;

use PragmaGoTech\Interview\CalculatorStrategy\TermCalculatorStrategy;
use PragmaGoTech\Interview\Enum\FeeTerm;
use PragmaGoTech\Interview\Model\LoanProposal;
use PragmaGoTech\Interview\Resolver\TermFeeResolver;
use PragmaGoTech\Interview\RoundingStrategy\NearestFiveRoundingStrategy;
use PragmaGoTech\Interview\Service\FeeCalculator;
use PragmaGoTech\Interview\Validator\LoanProposalValidator;

require_once __DIR__ . '/../vendor/autoload.php';

$loanProposal12 = new LoanProposal(FeeTerm::Term12, 19250);
$loanProposal24 = new LoanProposal(FeeTerm::Term24, 11500);

$feeCalculator = new FeeCalculator(
    new LoanProposalValidator,
    new TermFeeResolver,
);
$feeCalculator->setCalculatorStrategy(new TermCalculatorStrategy);
$feeCalculator->setRoundingStrategy(new NearestFiveRoundingStrategy);

var_dump(
    $feeCalculator->calculate($loanProposal12),
    $feeCalculator->calculate($loanProposal24),
);
