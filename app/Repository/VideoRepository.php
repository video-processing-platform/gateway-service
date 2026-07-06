<?php

namespace App\Repository;

use App\Models\Video;
use Illuminate\Pagination\LengthAwarePaginator;

class VideoRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Video::class;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function list(): LengthAwarePaginator
    {
        return $this->model->query()
            ->where('user_id', '=', auth()->id())
            ->orderByDesc('id')
            ->paginate(10);
    }

}
