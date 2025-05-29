<?php

declare(strict_types=1);

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    public function mount(): void {}

    public function render(): View
    {
        return view('livewire.pages.dashboard');
    }
}
