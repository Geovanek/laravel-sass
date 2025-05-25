<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends BaseModel
{
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }
}
