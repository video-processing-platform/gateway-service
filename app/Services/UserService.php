<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Http\DTO\Auth\AuthLoginDTO;
use App\Http\DTO\Auth\AuthRegisterDTO;
use App\Http\DTO\User\UserUpdateDTO;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Hash;

readonly class UserService
{
    /**
     * @param UserRepository $repository
     */
    public function __construct(private UserRepository $repository)
    {
    }

    /**
     * @param UserUpdateDTO $userUpdateDTO
     * @return void
     */
    public function update(UserUpdateDTO $userUpdateDTO): void
    {
        $data = $this->repository->findOne(auth()->id());

        $data->update([
            'name' => $userUpdateDTO->name,
            'password' => !empty($userUpdateDTO->password) ? Hash::make($userUpdateDTO->password) : $data->password
        ]);

    }

}
