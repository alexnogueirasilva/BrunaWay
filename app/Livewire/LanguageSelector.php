<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Support\Facades\App;
use Livewire\Component;

class LanguageSelector extends Component
{
    public string $currentLocale;

    public array $languages = [
        'pt_BR' => [
            'name' => 'Português',
            'flag' => '🇧🇷',
        ],
        'en' => [
            'name' => 'English',
            'flag' => '🇺🇸',
        ],
    ];

    public function mount(): void
    {
        $this->currentLocale = App::getLocale();
    }

    public function switchLanguage(string $locale): void
    {
        if (! array_key_exists($locale, $this->languages)) {
            return;
        }

        // Set cookie for 1 year
        cookie()->queue('locale', $locale, 525600);

        // Dispatch event to reload page via JavaScript
        $this->dispatch('reload-page');
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('livewire.language-selector');
    }
}
