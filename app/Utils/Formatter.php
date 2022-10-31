<?php

namespace App\Utils;

use NumberFormatter;

class Formatter
{
    public static function formatMoney($value)
    {
        // $formatter = new NumberFormatter('bn-BDT', NumberFormatter::DECIMAL);
        $formatter = new NumberFormatter('en-US', NumberFormatter::DECIMAL);
        $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 2);
        return $formatter->format($value);
    }
}
