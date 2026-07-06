<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseApiController;
use App\Http\DTO\User\UserUpdateDTO;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class UserController extends BaseApiController
{
    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    /**
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function profile(Request $request)
    {
        try {
            return $this->successResponse($request->user());
        } catch (Throwable $exception) {
            return $this->reportException($exception);
        }
    }

    /**
     * @return Response
     * @throws Exception
     */
    public function update(UserUpdateRequest $request)
    {
        try {
            $this->service->update(UserUpdateDTO::fromRequest($request));
            return $this->updatedResponse();
        } catch (Throwable $exception) {
            return $this->reportException($exception);
        }
    }
}
