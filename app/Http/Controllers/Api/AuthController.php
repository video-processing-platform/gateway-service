<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseApiController;
use App\Http\DTO\Auth\AuthRegisterDTO;
use App\Http\DTO\Auth\AuthLoginDTO;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class AuthController extends BaseApiController
{
    /**
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->service = $authService;
    }

    /**
     * @return Response
     * @throws Exception
     */
    public function register(AuthRegisterRequest $request)
    {
        try {
            $data = $this->service->doRegister(AuthRegisterDTO::fromRequest($request));
            return $this->createdResponse($data);
        } catch (Throwable $exception) {
            return $this->reportException($exception);
        }
    }

    /**
     * @return Response
     * @throws Exception
     */
    public function login(AuthLoginRequest $request)
    {
        try {
            $data =$this->service->doLogin(AuthLoginDTO::fromRequest($request));
            return $this->successResponse($data);
        } catch (Throwable $exception) {
            return $this->reportException($exception);
        }
    }

    /**
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function logout(Request $request): Response
    {
        try {
            $this->service->logout($request->user());
            return $this->successResponse(trans('auth.logout'));
        } catch (Throwable $exception) {
            return $this->reportException($exception);
        }
    }


}
