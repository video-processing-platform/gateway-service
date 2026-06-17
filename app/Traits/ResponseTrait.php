<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;

trait ResponseTrait
{
    /**
     * @param $data
     * @param string|null $message
     * @return Response
     */
    protected function successResponse($data = null, string $message = null): Response
    {
        $message = !empty($message) ? $message : trans('base.message.succeed');

        return response()->json([
            'status' => true,
            'code' => Response::HTTP_OK,
            'message' => $message,
            'data' => $data,
        ], Response::HTTP_OK);
    }

    /**
     * @param $data
     * @param string|null $message
     * @return Response
     */
    protected function createdResponse($data = null, string $message = null): Response
    {
        $message = !empty($message) ? $message : trans('base.message.created');

        return response()->json([
            'status' => true,
            'code' => Response::HTTP_CREATED,
            'message' => $message,
            'data' => $data,
        ], Response::HTTP_CREATED);
    }

    /**
     * @param $data
     * @param string|null $message
     * @return Response
     */
    protected function updatedResponse($data = null, string $message = null): Response
    {
        $message = !empty($message) ? $message : trans('base.message.updated');

        return response()->json([
            'status' => true,
            'code' => Response::HTTP_ACCEPTED,
            'message' => $message,
            'data' => $data,
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * @param $data
     * @param string|null $message
     * @return Response
     */
    protected function acceptedResponse($data = null, string $message = null): Response
    {
        $message = !empty($message) ? $message : trans('base.message.accepted');

        return response()->json([
            'status' => true,
            'code' => Response::HTTP_ACCEPTED,
            'message' => $message,
            'data' => $data,
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * @return Response
     */
    protected function deletedResponse(): Response
    {
        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * @param $data
     * @param $statusCode
     * @return Response
     */
    protected function apiException($data, $statusCode): Response
    {
        $message = !empty($message) ? $message : trans('base.message.failed');

        return response()->json([
            'status' => false,
            'code' => $statusCode,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
}
