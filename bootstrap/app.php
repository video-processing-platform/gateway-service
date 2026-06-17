<?php

use App\Traits\ExceptionHandlerTrait;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Traits\ResponseTrait;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo('auth/login');
        $middleware->group('api', [
            'throttle:user-ip',
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $handler = new class {
            use ExceptionHandlerTrait;
            use ResponseTrait;
        };

        $exceptions->render(function (Throwable $e, $request) use ($handler) {
            if ($handler->isJsonApi($request)) {
                return $handler->reportException($e);
            }
        });

    })->create();
