<?php

declare(strict_types = 1);

namespace App\Livewire\Auth;

use App\Brain\Auth\Tasks\SendMagicLink;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required', message: 'Email is required', translate: true)]
    #[Validate('email', message: 'Email is invalid', translate: true)]
    public string $email = '';

    public bool $showMessage = false;

    public function login(): void
    {
        SendMagicLink::dispatch([
            'email' => $this->email,
        ]);

        $this->showMessage = true;
    }

    public function render(): View
    {
        return view('livewire.auth.login');
    }
}
