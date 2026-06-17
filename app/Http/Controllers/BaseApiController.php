<?php

namespace App\Http\Controllers;

use App\Traits\ExceptionHandlerTrait;
use App\Traits\ResponseTrait;

class BaseApiController extends Controller
{
    use ResponseTrait, ExceptionHandlerTrait;

    protected object $service;
}
