<?php

namespace App\Http\DTO\User;


use App\Http\Requests\UserUpdateRequest;

readonly class UserUpdateDTO
{
    /**
     * @param string $name
     * @param string|null $password
     */
    public function __construct(
        public string  $name,
        public ?string $password,
    )
    {
    }

    /**
     * @param UserUpdateRequest $request
     * @return self
     */
    public static function fromRequest(UserUpdateRequest $request): self
    {
        return new static(
            $request->input('name'),
            $request->input('password'),
        );
    }

}
