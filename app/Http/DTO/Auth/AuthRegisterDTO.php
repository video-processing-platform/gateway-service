<?php

namespace App\Http\DTO\Auth;


use App\Http\Requests\AuthRegisterRequest;
use Illuminate\Support\Facades\Hash;

readonly class AuthRegisterDTO
{
    /**
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    )
    {
    }

    /**
     * @param AuthRegisterRequest $request
     * @return self
     */
    public static function fromRequest(AuthRegisterRequest $request): self
    {
        return new static(
            $request->input('name'),
            $request->input('email'),
            Hash::make($request->input('password')),
        );
    }

}
