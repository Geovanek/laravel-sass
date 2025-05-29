<?php

declare(strict_types = 1);

namespace App\Brain\Auth\Tasks;

use Brain\Task;
use Illuminate\Support\Facades\Auth;

/**
 * Task Login
 *
 * @property \App\Models\User $user
 * @property string $ip
 */
class Login extends Task
{
    public function handle(): self
    {
        $userId = session()->get('user_id');

        Auth::loginUsingId($userId);

        $this->user = Auth::user();

        $this->ip = request()->ip();

        return $this;
    }
}
