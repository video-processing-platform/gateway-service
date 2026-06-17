<?php

namespace App\Traits;

use Exception;

trait BaseAttributesTraits
{
    /**
     * @return string|null
     * @throws Exception
     */
    public function getCreatedAtDateAttribute(): ?string
    {
        return !empty($this->attributes['created_at']) ? jdate($this->attributes['created_at'])->format('H:i Y/m/d') : null;
    }
}
