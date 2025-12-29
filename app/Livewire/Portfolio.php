<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Portfolio as PortfolioModel;

class Portfolio extends Component
{
    public function render()
    {
        $portfolios = PortfolioModel::active()->ordered()->get();
        return view('livewire.portfolio', compact('portfolios'))->layout('layouts.app');
    }
}
