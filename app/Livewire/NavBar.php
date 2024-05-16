<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class NavBar extends Component
{
    public function login()
    {
        if (!auth()->check()) {
            auth()->login(User::first());
            $this->js('window.location.reload()');
        }
    }

    public function logout()
    {
        auth()->logout();
        return $this->redirect(route('products'), navigate: true);
    }

    public function render()
    {
        return view('livewire.nav-bar');
    }
}
