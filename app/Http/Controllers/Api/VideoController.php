<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseApiController;
use App\Http\DTO\Video\VideoStoreDTO;
use App\Http\Requests\VideoStoreRequest;
use App\Http\Resources\Video\VideoCollection;
use App\Http\Resources\Video\VideoResource;
use App\Services\VideoService;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class VideoController extends BaseApiController
{
    /**
     * @param VideoService $videoService
     */
    public function __construct(VideoService $videoService)
    {
        $this->service = $videoService;
    }

    /**
     * @return Response
     * @throws Exception
     */
    public function index()
    {
        try {
            $data = $this->service->list();
            return $this->successResponse(new VideoCollection($data));
        } catch (Throwable $exception) {
            return $this->reportException($exception);
        }
    }

    /**
     * @param string $video
     * @return Response
     * @throws Exception
     */
    public function show(string $video)
    {
        try {
            $data = $this->service->show($video);
            return $this->successResponse(new VideoResource($data));
        } catch (Throwable $exception) {
            return $this->reportException($exception);
        }
    }

    /**
     * @param VideoStoreRequest $request
     * @return Response
     * @throws Exception
     */
    public function store(VideoStoreRequest $request)
    {
        try {
            $this->service->store(VideoStoreDTO::fromRequest($request));
            return $this->createdResponse(true);
        } catch (Throwable $exception) {
            return $this->reportException($exception);
        }
    }

    /**
     * @param string $video
     * @return Response
     * @throws Exception
     */
    public function destroy(string $video)
    {
        try {
            $this->service->destroy($video);
            return $this->deletedResponse();
        } catch (Throwable $exception) {
            return $this->reportException($exception);
        }
    }


}
