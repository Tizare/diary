<?php

declare(strict_types=1);

namespace App\Enums;

enum Theme: string
{
    case PINK = 'pink';
    case BLUE = 'blue';
    case BEIGE = 'beige';

    public static function all(): array
    {
        return [
            self::PINK->value,
            self::BLUE->value,
            self::BEIGE->value
        ];
    }
}
