<?php

declare(strict_types = 1);

namespace App\Brain\Auth\Tasks;

use Brain\Task;
use Exception;

/**
 * Task Check2FaCode
 *
 * @property-read \App\Models\User $user
 * @property-read int $code
 */
class Check2FaCode extends Task
{
    public function handle(): self
    {
        if ($this->user->two_factor_code != $this->code) {
            throw new Exception(__('Invalid 2FA code'));
        }

        if ($this->user->two_factor_expires_at < now()) {
            throw new Exception(__('2FA code expired'));
        }

        $this->user->update([
            'two_factor_code'       => null,
            'two_factor_expires_at' => null,
        ]);

        session()->put('2fa:auth', true);

        return $this;
    }
}
