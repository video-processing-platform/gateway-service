<?php

namespace App\Enums;

enum VideoStatus: int implements EnumInterface
{
    use BaseEnumTrait;

    case PENDING = 1;
    case PROCESSING = 2;
    case COMPLETED = 3;
    case FAILED = 4;

    /**
     * @return string
     */
    public static function getPrefix(): string
    {
        return 'base.enums.video_status.';
    }
}
