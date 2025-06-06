<?php

declare(strict_types = 1);

namespace App\Livewire\Pages;

use Illuminate\View\View;
use Livewire\Component;

class Users extends Component
{
    public function render(): View
    {
        return view('livewire.pages.users');
    }
}
