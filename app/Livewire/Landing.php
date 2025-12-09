<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Service;

class Landing extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        $services = Service::active()->ordered()->take(6)->get();
        return view('livewire.landing', compact('services'));
    }
}
