<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Auth;

use App\Brain\Auth\Exceptions\InvalideToken\InvalideToken;
use App\Brain\Auth\Processes\AuthProcess;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class MagicLinkController extends Controller
{
    public function __invoke(string $token): RedirectResponse
    {
        try {
            AuthProcess::dispatchSync([
                'token' => $token,
            ]);

            return to_route('dashboard');
        } catch (InvalideToken) {
            return to_route('login');
        }
    }
}
