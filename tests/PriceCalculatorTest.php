<?php

namespace Tests;

use App\PriceCalculator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class PriceCalculatorTest extends TestCase
{
    private PriceCalculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new PriceCalculator();
    }

    public function testCalculatePriceWithTax(): void
    {
        $this->assertSame(
            119.0,
            $this->calculator->calculateWithTax(100, 19)
        );
    }

    public function testApplyDiscount(): void
    {
        $this->assertSame(
            80.0,
            $this->calculator->applyDiscount(100, 20)
        );
    }

    public function testNegativePriceThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->calculator->calculateWithTax(-100, 19);
    }

    public function testInvalidDiscountThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->calculator->applyDiscount(100, 120);
    }
}
