<?php

namespace App\Http\DTO;

trait BaseDTO
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);

    }
}
