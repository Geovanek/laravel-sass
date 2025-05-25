<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends BaseModel
{
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
