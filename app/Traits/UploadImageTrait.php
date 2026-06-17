<?php

namespace App\Traits;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

trait UploadImageTrait
{
    /**
     * @param UploadedFile $image
     * @return string
     */
    protected function uploadImage(UploadedFile $image): string
    {
        $path = 'image/' . $this->basePath . '/' . now()->format('Y-m-d') . '/' . now()->format('H-i-s') . '-' . $image->getClientOriginalName();
        Storage::disk('public')->put($path, $image->getContent());
        return $path;
    }

    /**
     * @param string $path
     * @return bool
     */
    protected function removeImage(string $path): bool
    {
        $storage = Storage::disk('public');
        if ($storage->exists($path)) {
            return $storage->delete($path);
        }
        return false;
    }

    /**
     * @param string|null $path
     * @return ResponseFactory|Response|BinaryFileResponse
     */
    protected function displayImage(?string $path): Response|BinaryFileResponse|ResponseFactory
    {
        $storage = Storage::disk('public');

        if (!$path || !$storage->exists($path)) {
            $defaultPath = public_path('assets/defaults/no-image.png');
            $type = mime_content_type($defaultPath);
            return response()->file($defaultPath, [
                'Content-Type' => $type
            ]);
        }

        $file = $storage->get($path);
        $type = $storage->mimeType($path);

        return response($file, 200)->header('Content-Type', $type);

    }



}
