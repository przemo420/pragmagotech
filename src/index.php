<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview;

use PragmaGoTech\Interview\Enum\FeeTerm;
use PragmaGoTech\Interview\Model\LoanProposal;
use PragmaGoTech\Interview\Service\FeeCalculator;

require_once __DIR__ . '/../vendor/autoload.php';

$loanProposal12 = new LoanProposal(FeeTerm::Term12, 19250);
$loanProposal24 = new LoanProposal(FeeTerm::Term24, 11500);

var_dump(
    (new FeeCalculator)->calculate($loanProposal12),
    (new FeeCalculator)->calculate($loanProposal24),
);
