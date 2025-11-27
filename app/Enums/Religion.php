<?php

namespace App\Enums;

enum Religion: string
{
    case ISLAM = 'islam';
    case CHRISTIANITY = 'christianity';
    case CATHOLICISM = 'catholicism';
    case HINDUISM = 'hinduism';
    case BUDDHISM = 'buddhism';
    case CONFUCIANISM = 'confucianism';

    public function label(): string
    {
        return match($this) {
            self::ISLAM => 'Islam',
            self::CHRISTIANITY => 'Kristen',
            self::CATHOLICISM => 'Katolik',
            self::HINDUISM => 'Hindu',
            self::BUDDHISM => 'Buddha',
            self::CONFUCIANISM => 'Konghucu',
        };
    }
}
