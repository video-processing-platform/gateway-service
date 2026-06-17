<?php

namespace App\Http\DTO\Auth;


use App\Http\Requests\AuthLoginRequest;

readonly class AuthLoginDTO
{
    /**
     * @param string $email
     * @param string $password
     */
    public function __construct(
        public string $email,
        public string $password,
    )
    {
    }

    /**
     * @param AuthLoginRequest $request
     * @return self
     */
    public static function fromRequest(AuthLoginRequest $request): self
    {
        return new static(
            $request->input('email'),
            $request->input('password'),
        );
    }

}
