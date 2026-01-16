<div x-data @reload-page.window="window.location.reload()">
    <flux:dropdown position="bottom" align="end">
        <flux:button variant="ghost" size="sm" class="gap-2">
            <span>{{ $languages[$currentLocale]['flag'] }}</span>
            <span class="hidden sm:inline">{{ $languages[$currentLocale]['name'] }}</span>
            <flux:icon.chevron-down variant="micro" />
        </flux:button>

        <flux:menu>
            @foreach($languages as $code => $language)
                <flux:menu.item
                    wire:click="switchLanguage('{{ $code }}')"
                    :selected="$currentLocale === '{{ $code }}'"
                >
                    <span>{{ $language['flag'] }}</span>
                    <span>{{ $language['name'] }}</span>
                </flux:menu.item>
            @endforeach
        </flux:menu>
    </flux:dropdown>
</div>
