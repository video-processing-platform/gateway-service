<?php

namespace App\Http\DTO\Video;


use App\Enums\VideoStatus;
use App\Http\Requests\VideoStoreRequest;
use Illuminate\Http\UploadedFile;

readonly class VideoStoreDTO
{
    /**
     * @param string $title
     * @param UploadedFile $video
     * @param int $status
     */
    public function __construct(
        public string $title,
        public UploadedFile $video,
        public int $status,
    )
    {
    }

    /**
     * @param VideoStoreRequest $request
     * @return self
     */
    public static function fromRequest(VideoStoreRequest $request): self
    {
        return new static(
            $request->input('title'),
            $request->file('file'),
            VideoStatus::PENDING->value
        );
    }

}
