<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Http\DTO\Auth\AuthLoginDTO;
use App\Http\DTO\Auth\AuthRegisterDTO;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Hash;

readonly class AuthService
{
    /**
     * @param UserRepository $repository
     */
    public function __construct(private UserRepository $repository)
    {
    }

    /**
     * @param AuthRegisterDTO $registerDTO
     * @return array
     */
    public function doRegister(AuthRegisterDTO $registerDTO): array
    {
        $data = $this->repository->create([
            'name' => $registerDTO->name,
            'email' => $registerDTO->email,
            'password' => $registerDTO->password,
        ]);

        return [
            'token' => $data->createToken('REGISTER_TOKEN')->plainTextToken,
            'user' => $data
        ];
    }

    /**
     * @param AuthLoginDTO $loginDTO
     * @return array
     * @throws CustomException
     */
    public function doLogin(AuthLoginDTO $loginDTO): array
    {
        $data = $this->repository->findByEmail($loginDTO->email);

        if (!$data) {
            throw new CustomException('کاربری با این ایمیل یافت نشد');
        }


        if (!Hash::check($loginDTO->password, $data->password)) {
            throw new CustomException('ایمیل یا رمز عبور اشتباه است');
        }

        return [
            'token' => $data->createToken('LOGIN_TOKEN')->plainTextToken,
            'user' => $data
        ];

    }

    /**
     * @param object $user
     * @return void
     */
    public function logout(object $user): void
    {
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
    }
}
