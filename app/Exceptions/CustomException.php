<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CustomException extends Exception
{
    /**
     * @param string|null $message
     * @param int|null $code
     */
    public function __construct(null|string $message = null, null|int $code = null)
    {
        $msg = !empty($message) ? $message : trans('base.exception.bad_request');
        $status = !empty($code) ? $code : ResponseAlias::HTTP_BAD_REQUEST;

        parent::__construct($msg, $status);
    }
}
