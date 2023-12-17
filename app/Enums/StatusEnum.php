<?php

namespace App\Enums;

enum StatusEnum: string
{
    case CREATED = 'created';
    case NEW = 'new';
    case BUSY = 'busy';

    public function toString(): ?string
    {
        return match ($this) {
            self::CREATED => 'Создан',
            self::NEW => 'Новый',
            self::BUSY => 'Подтвержден',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::CREATED => 'green',
            self::NEW => 'yellow',
            self::BUSY => 'red',
        };
    }
}
