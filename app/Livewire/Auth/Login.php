<?php

declare(strict_types = 1);

namespace App\Livewire\Auth;

use App\Brain\Auth\Processes\AuthProcess;
use App\Livewire\Pages\Dashboard;
use Illuminate\View\View;
use Livewire\Component;

class Login extends Component
{
    public string $email;

    public string $password;

    public bool $remember = false;

    public function login(): void
    {
        AuthProcess::dispatch([
            'email'    => $this->email,
            'password' => $this->password,
        ]);

        $this->redirect(Dashboard::class);
    }

    public function render(): View
    {
        return view('livewire.auth.login');
    }
}
