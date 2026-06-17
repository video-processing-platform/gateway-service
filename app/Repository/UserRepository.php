<?php

namespace App\Repository;

use App\Models\User;

class UserRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * @param string $email
     * @return object|null
     */
    public function findByEmail(string $email): ?object
    {
        return $this->model->query()
            ->where('email', '=', $email)->first();
    }
}
