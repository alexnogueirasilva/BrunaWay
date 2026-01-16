@props([
'sidebar' => false,
])

@if($sidebar)
    <flux:sidebar.brand name="BrunaWay" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-8 items-center justify-center rounded-md bg-blue-600 text-white">
            <flux:icon.bolt variant="solid" class="size-5" />
        </x-slot>
    </flux:sidebar.brand>
@else
    <flux:brand name="BrunaWay" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-8 items-center justify-center rounded-md bg-blue-600 text-white">
            <flux:icon.bolt variant="solid" class="size-5" />
        </x-slot>
    </flux:brand>
@endif
