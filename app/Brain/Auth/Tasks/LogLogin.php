<?php

declare(strict_types = 1);

namespace App\Brain\Auth\Tasks;

use Brain\Task;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * @property-read \App\Models\User $user
 */
class LogLogin extends Task implements ShouldQueue
{
    public function handle(): self
    {
        $this->user->logins()->create([
            'ip' => request()->ip(),
        ]);

        return $this;
    }
}
