<?php

declare(strict_types = 1);

namespace App\Livewire\Auth;

use Illuminate\View\View;
use Livewire\Component;

class PasswordRequest extends Component
{
    public function render(): View
    {
        return view('livewire.auth.password-request');
    }
}
