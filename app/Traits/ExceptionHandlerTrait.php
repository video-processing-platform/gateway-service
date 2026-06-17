<?php

namespace App\Traits;

use App\Exceptions\CustomException;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Request;
use Illuminate\Routing\Exceptions\BackedEnumCaseNotFoundException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;
use Illuminate\View\ViewException;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Symfony\Component\ErrorHandler\Error\FatalError;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;
use TypeError;

trait ExceptionHandlerTrait
{
    /**
     * @param Throwable $handler
     * @return Response
     * @throws Exception
     */
    public function reportException(Throwable $handler): Response
    {
        return match (true) {
            $handler instanceof CustomException => $this->reportError($handler, $handler->getMessage(), $handler->getCode()),
            $handler instanceof ValidationException => $this->validationError($handler),
            $handler instanceof TokenMismatchException => $this->reportError($handler, trans('base.exception.token_mismatch'), Response::HTTP_BAD_REQUEST),
            $handler instanceof QueryException => $this->reportError($handler, trans('base.exception.query'), Response::HTTP_BAD_REQUEST),
            $handler instanceof InternalErrorException || $handler instanceof FatalError => $this->reportError($handler, trans('base.exception.internal_server')),
            $handler instanceof ModelNotFoundException => $this->reportError($handler, trans('base.exception.model_not_found'), Response::HTTP_NOT_FOUND),
            $handler instanceof AuthorizationException => $this->reportError($handler, trans('base.exception.authorization'), Response::HTTP_FORBIDDEN),
            $handler instanceof AuthenticationException => $this->reportError($handler, trans('base.exception.authentication'), Response::HTTP_UNAUTHORIZED),
            $handler instanceof MethodNotAllowedHttpException => $this->reportError($handler, trans('base.exception.method_not_allowed_http'), Response::HTTP_METHOD_NOT_ALLOWED),
            $handler instanceof NotFoundHttpException || $handler instanceof RouteNotFoundException => $this->reportError($handler, trans('base.exception.not_found_http'), Response::HTTP_NOT_FOUND),
            $handler instanceof ViewException => $this->reportError($handler, trans('base.exception.view'), Response::HTTP_BAD_REQUEST),
            $handler instanceof TypeError => $this->reportError($handler, trans('base.exception.type_error'), Response::HTTP_UNPROCESSABLE_ENTITY),
            $handler instanceof ThrottleRequestsException => $this->reportError($handler, trans('base.exception.throttle_request'), Response::HTTP_TOO_MANY_REQUESTS),
            $handler instanceof BackedEnumCaseNotFoundException => $this->reportError($handler, trans('base.exception.backed_enum_case_not_found'), Response::HTTP_UNPROCESSABLE_ENTITY),
            $handler instanceof NotAcceptableHttpException => $this->reportError($handler, trans('base.exception.backed_enum_case_not_found'), Response::HTTP_NOT_ACCEPTABLE),
            default => $this->reportError($handler, $handler->getMessage(), Response::HTTP_BAD_REQUEST)
        };
    }

    /**
     * @param Throwable $handler
     * @param string $message
     * @param int $statusCode
     * @return Response
     * @throws Exception
     */
    private function reportError(Throwable $handler, string $message = "There was an internal server error in your application", int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR): Response
    {
        if (App::environment('local') && !empty($handler->getMessage())) {
            return $this->jsonResponse($handler->getMessage(), $statusCode);
        }

        return $this->jsonResponse($message, $statusCode);
    }

    /**
     * @param string $message
     * @param int $statusCode
     * @return Response
     */
    private function jsonResponse(string $message, int $statusCode): Response
    {
        $payload = ['error' => $message, 'code' => $this->getStatusAbb($statusCode)];

        return $this->apiException($payload, $statusCode);
    }


    /**
     * @param int $statusCode
     * @return string
     */
    private function getStatusAbb(int $statusCode): string
    {
        $statusTexts = array_flip(Response::$statusTexts);

        if (in_array($statusCode, $statusTexts)) {
            $statusAbb = array_search($statusCode, $statusTexts);
        } else {
            $statusAbb = array_search(Response::HTTP_BAD_REQUEST, $statusTexts);
        }

        return str_replace(' ', '_', strtoupper($statusAbb));
    }

    /**
     * @param ValidationException $exception
     * @return Response
     * @throws Exception
     */
    private function validationError(ValidationException $exception): Response
    {
        $validationErrors = $exception->validator->errors()->getMessages();

        if (is_array($validationErrors)) {
            $validationErrors = reset($validationErrors);
            return $this->reportError($exception, $validationErrors[0], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->reportError($exception, $exception->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function isJsonApi(Request $request): bool
    {
        return str_contains($request->getUri(), '/oauth/token') || str_contains($request->getUri(), '/api/') ||
            $request->expectsJson() || $request->wantsJson() || ($request->ajax() && !$request->pjax() && $request->acceptsAnyContentType());
    }
}
