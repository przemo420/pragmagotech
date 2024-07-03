<?php

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Enum\FeeTerm;
use PragmaGoTech\Interview\Model\LoanProposal;
use PragmaGoTech\Interview\Service\FeeCalculator;

class FeeCalculatorTest extends TestCase
{
    private FeeCalculator $feeCalculator;

    protected function setUp(): void
    {
        $this->feeCalculator = new FeeCalculator();
    }

    public static function validFeeDataProvider(): array
    {
        return [
            ['term' => FeeTerm::Term12, 'amount' => 19250, 'expected' => 385],
            ['term' => FeeTerm::Term24, 'amount' => 11500, 'expected' => 460],
        ];
    }

    #[DataProvider('validFeeDataProvider')]
    public function testCalculateFeeFor12MonthsTerm(FeeTerm $term, float $amount, float $expected): void
    {
        $loanProposal = new LoanProposal($term, $amount);
        $fee          = $this->feeCalculator->calculate($loanProposal);

        $this->assertEquals($expected, $fee);
    }

    public static function invalidFeeDataProvider(): array
    {
        return [
            [999],
            [20001],
        ];
    }

    #[DataProvider('invalidFeeDataProvider')]
    public function testInvalidAmountBelowMinimum(mixed $amount): void
    {
        $this->expectException(InvalidArgumentException::class);

        $loanProposal = new LoanProposal(FeeTerm::Term12, $amount);
        $this->feeCalculator->calculate($loanProposal);
    }
}
