<?php

namespace App;

class PriceCalculator
{
    public function calculateWithTax(float $price, float $taxRate): float
    {
        if ($price < 0 || $taxRate < 0) {
            throw new \InvalidArgumentException(
                'Price and tax rate cannot be negative.'
            );
        }

        return round($price * (1 + $taxRate / 100), 2);
    }

    public function applyDiscount(float $price, float $discount): float
    {
        if ($price < 0 || $discount < 0 || $discount > 100) {
            throw new \InvalidArgumentException('Invalid price or discount.');
        }

        return round($price * (1 - $discount / 100), 2);
    }
}
