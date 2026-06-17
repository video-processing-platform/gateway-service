<?php

namespace App\Enums;

enum VideoJobType: int implements EnumInterface
{
    use BaseEnumTrait;

    case TRANSCODE = 1;
    case GENERATE_THUMBNAIL = 2;
    case EXTRACT_METADATA = 3;
    case COMPRESS_VIDEO = 4;

    /**
     * @return string
     */
    public static function getPrefix(): string
    {
        return 'base.enums.video_job_type.';
    }
}
