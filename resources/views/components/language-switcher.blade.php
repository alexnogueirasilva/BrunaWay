@php
    $currentLocale = app()->getLocale();
    $languages = [
        'pt_BR' => ['name' => 'Português', 'flag' => '🇧🇷'],
        'en' => ['name' => 'English', 'flag' => '🇺🇸'],
    ];
@endphp

<div x-data="{ open: false }" class="relative">
    <flux:button 
        variant="ghost" 
        size="sm" 
        class="gap-2"
        x-on:click="open = !open"
    >
        <span>{{ $languages[$currentLocale]['flag'] }}</span>
        <span class="hidden sm:inline">{{ $languages[$currentLocale]['name'] }}</span>
        <flux:icon.chevron-down variant="micro" />
    </flux:button>

    <div 
        x-show="open"
        x-on:click.outside="open = false"
        x-transition
        class="absolute right-0 mt-2 w-40 bg-white dark:bg-zinc-800 rounded-lg shadow-lg border border-zinc-200 dark:border-zinc-700 py-1 z-50"
        style="display: none;"
    >
        @foreach($languages as $code => $language)
            <button
                type="button"
                x-data
                x-on:click="
                    fetch('{{ route('locale.switch', $code) }}', {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    }).then(() => {
                        Livewire.navigate(window.location.href)
                    })
                "
                class="w-full px-4 py-2 text-left hover:bg-zinc-100 dark:hover:bg-zinc-700 flex items-center gap-2 {{ $currentLocale === $code ? 'bg-zinc-50 dark:bg-zinc-700/50' : '' }}"
            >
                <span>{{ $language['flag'] }}</span>
                <span class="text-sm">{{ $language['name'] }}</span>
            </button>
        @endforeach
    </div>
</div>
