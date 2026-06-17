<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['video_id', 'type', 'status', 'error_message'])]
class VideoJob extends Model
{
    use SoftDeletes;

    /**
     * @return BelongsTo
     */
    public function video(): BelongsTo
    {
        return $this->belongsTo(Video::class, 'video_id', 'id');
    }

    /**
     * @return string[]
     */
    protected function casts(): array
    {
        return [
            'status' => 'integer',
            'type' => 'integer',
        ];
    }
}
