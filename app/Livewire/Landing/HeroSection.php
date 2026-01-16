<?php

declare(strict_types=1);

namespace App\Livewire\Landing;

use Livewire\Component;

class HeroSection extends Component
{
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('livewire.landing.hero-section');
    }
}
