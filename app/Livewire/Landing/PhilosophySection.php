<?php

declare(strict_types=1);

namespace App\Livewire\Landing;

use Livewire\Component;

class PhilosophySection extends Component
{
    public string $activeTab = 'values';

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('livewire.landing.philosophy-section');
    }
}
