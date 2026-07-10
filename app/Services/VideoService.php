<?php

namespace App\Services;

use App\Http\DTO\Video\VideoStoreDTO;
use App\Repository\VideoRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;

readonly class VideoService
{
    /**
     * @param VideoRepository $repository
     */
    public function __construct(private VideoRepository $repository)
    {
    }

    /**
     * @return LengthAwarePaginator
     */
    public function list(): LengthAwarePaginator
    {
        return $this->repository->list();
    }

    /**
     * @param int $id
     * @return object
     */
    public function show(int $id): object
    {
        return $this->repository->findOne($id);
    }

    /**
     * @param VideoStoreDTO $storeDTO
     * @return void
     * @throws Throwable
     */
    public function store(VideoStoreDTO $storeDTO): void
    {
        $result = DB::transaction(function () use ($storeDTO) {

            $path = $this->upload($storeDTO->video);

            return $this->repository->create([
                'user_id' => auth()->id(),
                'title' => $storeDTO->title,
                'status' => $storeDTO->status,
                'path' => $path,
            ]);

        }, 2);

        app(RabbitMQService::class)->publish('video.processing.queue', [
            'video_id' => $result->id,
            'path' => $result->path,
        ]);

    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $data = $this->repository->findOne($id);
        Storage::disk('s3')->delete($data->path);
        $data->delete();
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    private function upload(UploadedFile $file): string
    {
        $path = auth()->id() . '/' . now()->format('Y-m-d') . '-' . now()->format('H-i-s') . '/main/' . $file->getClientOriginalName();
        Storage::disk('s3')->put($path, $file->getContent());
        return $path;
    }


}
