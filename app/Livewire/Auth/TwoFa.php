<?php

declare(strict_types = 1);

namespace App\Livewire\Auth;

use App\Brain\Auth\Tasks\Check2FaCode;
use App\Brain\Auth\Tasks\Generate2FaCode;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class TwoFa extends Component
{
    #[Validate('required', message: 'The code is required.')]
    #[Validate('numeric', message: 'The code must be numeric.')]
    #[Validate('digits:6', message: 'The code must be 6 digits.')]
    public int $code;

    public function mount(): null | RedirectResponse | Redirector
    {
        if (session()->has('2fa:auth')) {
            return redirect()->route('dashboard');
        }

        if (! Auth::user()->two_factor_code) {
            return redirect()->route('login');
        }

        return null;
    }

    public function login(): void
    {
        Check2FaCode::dispatch([
            'user' => Auth::user(),
            'code' => $this->code,
        ]);

        $this->redirect(route('dashboard'));
    }

    public function resendCode(): void
    {
        Generate2FaCode::dispatch([
            "user" => Auth::user(),
        ]);
    }

    public function render(): View
    {
        return view('livewire.auth.two-fa');
    }
}
