<?php

declare(strict_types=1);

namespace App\Livewire\Landing;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class PhilosophySection extends Component
{
    public string $activeTab = 'values';

    public function render(): View
    {
        return view('livewire.landing.philosophy-section');
    }
}
