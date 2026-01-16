<?php

declare(strict_types=1);

namespace App\Livewire\Landing;

use Illuminate\Contracts\View\View;
use Livewire\Component;
class CtaSection extends Component
{
    public function render(): View
    {
        return view('livewire.landing.cta-section');
    }
}
