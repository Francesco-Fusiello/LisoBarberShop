<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminDashboard extends Component
{
    public function render()
    {
         
        return view('livewire.admin-dashboard')->layout('components.layout'); 
    }
}
