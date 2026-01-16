<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ appearance: $persist('system').as('appearance') }" :class="appearance === 'dark' || (appearance === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches) ? 'dark' : ''">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BrunaWay') }} - Disciplina, Organização e Responsabilidade</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxStyles
</head>
<body class="font-sans antialiased bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 dark:bg-zinc-950/80 backdrop-blur-lg border-b border-zinc-200 dark:border-zinc-800">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center gap-2">
                    <flux:icon.bolt variant="solid" class="size-6 text-blue-600" />
                    <flux:heading size="md" class="font-bold">BrunaWay</flux:heading>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center gap-6">
                    <flux:link href="#features" class="text-sm hover:text-blue-600 transition-colors">Como funciona</flux:link>
                    <flux:link href="#philosophy" class="text-sm hover:text-blue-600 transition-colors">Filosofia</flux:link>

                    @if (Route::has('login'))
                        @auth
                            <flux:button
                                href="{{ url('/dashboard') }}"
                                variant="outline"
                                size="sm"
                                icon="home"
                            >
                                Dashboard
                            </flux:button>
                        @else
                            <flux:button
                                href="{{ route('login') }}"
                                variant="ghost"
                                size="sm"
                            >
                                Entrar
                            </flux:button>

                            @if (Route::has('register'))
                                <flux:button
                                    href="{{ route('register') }}"
                                    variant="primary"
                                    size="sm"
                                    icon="arrow-right"
                                    icon:trailing
                                >
                                    Começar grátis
                                </flux:button>
                            @endif
                        @endauth
                    @endif

                    <!-- Language Selector -->
                    <x-language-switcher />
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center gap-2">
                    <x-language-switcher />
                    <flux:button variant="ghost" size="sm" icon="bars-3" x-on:click="$dispatch('open-modal', 'mobile-menu')" />
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Modal -->
    <flux:modal name="mobile-menu" class="md:hidden">
        <div class="space-y-4">
            <flux:heading size="lg">Menu</flux:heading>

            <div class="space-y-2">
                <flux:link href="#features" class="block py-2">Como funciona</flux:link>
                <flux:link href="#philosophy" class="block py-2">Filosofia</flux:link>

                @if (Route::has('login'))
                    @auth
                        <flux:button
                            href="{{ url('/dashboard') }}"
                            variant="outline"
                            class="w-full"
                            icon="home"
                        >
                            Dashboard
                        </flux:button>
                    @else
                        <flux:button
                            href="{{ route('login') }}"
                            variant="ghost"
                            class="w-full"
                        >
                            Entrar
                        </flux:button>

                        @if (Route::has('register'))
                            <flux:button
                                href="{{ route('register') }}"
                                variant="primary"
                                class="w-full"
                            >
                                Começar grátis
                            </flux:button>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </flux:modal>

    <!-- Main Content -->
    <main class="pt-16">
        <!-- Hero Section -->
        <livewire:landing.hero-section />

        <!-- Features Section -->
        <livewire:landing.features-section />

        <!-- Philosophy Section -->
        <div id="philosophy">
            <livewire:landing.philosophy-section />
        </div>

        <!-- CTA Section -->
        <livewire:landing.cta-section />
    </main>

    @fluxScripts
</body>
</html>
