<?php

namespace App\Enums;

enum IncomeRange: string
{
    case RANGE_1 = 'range_1';
    case RANGE_2 = 'range_2';
    case RANGE_3 = 'range_3';
    case RANGE_4 = 'range_4';
    case RANGE_5 = 'range_5';

    public function label(): string
    {
        return match($this) {
            self::RANGE_1 => 'Kurang dari Rp 1.000.000',
            self::RANGE_2 => 'Rp 1.000.000 - Rp 2.000.000',
            self::RANGE_3 => 'Rp 2.000.000 - Rp 5.000.000',
            self::RANGE_4 => 'Rp 5.000.000 - Rp 10.000.000',
            self::RANGE_5 => 'Lebih dari Rp 10.000.000',
        };
    }
}
