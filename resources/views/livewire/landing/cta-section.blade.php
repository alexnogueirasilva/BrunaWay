<div>
<section class="py-32 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-0 left-1/4 w-[600px] h-[600px] bg-white/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-1/4 w-[600px] h-[600px] bg-white/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1.5s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-white/10 rounded-full blur-3xl"></div>
    </div>

    <div class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff08_1px,transparent_1px),linear-gradient(to_bottom,#ffffff08_1px,transparent_1px)] bg-[size:64px_64px]"></div>

    <div class="container mx-auto px-6 lg:px-8 relative z-10">
        <div class="max-w-5xl mx-auto text-center space-y-12" wire:transition>
            <div class="animate-fade-in">
                <flux:badge size="lg" color="white" class="inline-flex items-center gap-2 shadow-xl shadow-black/10 px-6 py-2">
                    <flux:icon.rocket-launch variant="micro" class="animate-pulse" />
                    {{ __('landing.cta.badge') }}
                </flux:badge>
            </div>

            <div class="space-y-6">
                <flux:heading size="xl" class="text-6xl md:text-7xl lg:text-8xl font-extrabold text-white leading-tight drop-shadow-2xl">
                    {{ __('landing.cta.title') }}
                </flux:heading>

                <flux:text class="text-2xl md:text-3xl text-white/95 max-w-3xl mx-auto font-light leading-relaxed">
                    {{ __('landing.cta.subtitle') }}
                </flux:text>
            </div>

            <div class="grid md:grid-cols-3 gap-8 pt-12">
                <div class="bg-white/15 backdrop-blur-md rounded-2xl p-8 border border-white/30 shadow-2xl hover:bg-white/20 hover:scale-105 hover:border-white/40 transition-all duration-300" wire:transition>
                    <div class="bg-white/20 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <flux:icon.shield-check variant="solid" class="size-8 text-white" />
                    </div>
                    <flux:heading size="md" class="text-white mb-3 text-2xl font-bold">{{ __('landing.cta.benefits.safe.title') }}</flux:heading>
                    <flux:text variant="subtle" class="text-white/90 text-base leading-relaxed">
                        {{ __('landing.cta.benefits.safe.description') }}
                    </flux:text>
                </div>

                <div class="bg-white/15 backdrop-blur-md rounded-2xl p-8 border border-white/30 shadow-2xl hover:bg-white/20 hover:scale-105 hover:border-white/40 transition-all duration-300" wire:transition style="animation-delay: 0.1s;">
                    <div class="bg-white/20 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <flux:icon.chart-bar variant="solid" class="size-8 text-white" />
                    </div>
                    <flux:heading size="md" class="text-white mb-3 text-2xl font-bold">{{ __('landing.cta.benefits.complete.title') }}</flux:heading>
                    <flux:text variant="subtle" class="text-white/90 text-base leading-relaxed">
                        {{ __('landing.cta.benefits.complete.description') }}
                    </flux:text>
                </div>

                <div class="bg-white/15 backdrop-blur-md rounded-2xl p-8 border border-white/30 shadow-2xl hover:bg-white/20 hover:scale-105 hover:border-white/40 transition-all duration-300" wire:transition style="animation-delay: 0.2s;">
                    <div class="bg-white/20 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <flux:icon.academic-cap variant="solid" class="size-8 text-white" />
                    </div>
                    <flux:heading size="md" class="text-white mb-3 text-2xl font-bold">{{ __('landing.cta.benefits.educational.title') }}</flux:heading>
                    <flux:text variant="subtle" class="text-white/90 text-base leading-relaxed">
                        {{ __('landing.cta.benefits.educational.description') }}
                    </flux:text>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-6 pt-12">
                <flux:button
                    href="{{ route('register') }}"
                    size="base"
                    class="w-full sm:w-auto px-8 py-4 text-lg bg-white text-blue-600 hover:bg-zinc-100 font-bold shadow-2xl hover:shadow-3xl hover:scale-105 transition-all duration-300 data-loading:opacity-50 data-loading:pointer-events-none"
                    icon="arrow-right"
                    icon:trailing
                >
                    {{ __('landing.cta.primary') }}
                </flux:button>

                @auth
                    <flux:button
                        href="{{ url('/dashboard') }}"
                        variant="outline"
                        size="base"
                        class="w-full sm:w-auto px-8 py-4 text-lg border-2 border-white text-white hover:bg-white/20 font-semibold backdrop-blur-sm hover:scale-105 transition-all duration-300"
                        icon="home"
                    >
                        {{ __('landing.cta.secondary_dashboard') }}
                    </flux:button>
                @else
                    <flux:button
                        href="{{ route('login') }}"
                        variant="outline"
                        size="base"
                        class="w-full sm:w-auto px-8 py-4 text-lg border-2 border-white text-white hover:bg-white/20 font-semibold backdrop-blur-sm hover:scale-105 transition-all duration-300"
                        icon="arrow-right-end-on-rectangle"
                    >
                        {{ __('landing.cta.secondary_login') }}
                    </flux:button>
                @endauth
            </div>

            <div class="pt-12 flex flex-wrap items-center justify-center gap-8">
                <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-full px-6 py-3 border border-white/20">
                    <flux:icon.check-circle variant="solid" class="size-6 text-white" />
                    <flux:text class="text-base text-white font-medium">{{ __('landing.cta.trust_no_card') }}</flux:text>
                </div>
                <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-full px-6 py-3 border border-white/20">
                    <flux:icon.lock-closed variant="solid" class="size-6 text-white" />
                    <flux:text class="text-base text-white font-medium">{{ __('landing.cta.trust_protected') }}</flux:text>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="bg-zinc-900 text-zinc-400 py-12">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="space-y-4">
                    <flux:heading size="lg" class="text-white">BrunaWay</flux:heading>
                    <flux:text variant="subtle" class="text-sm">
                        Disciplina, organização e responsabilidade para formar adultos preparados.
                    </flux:text>
                </div>

                <div class="space-y-3">
                    <flux:heading size="md" class="text-white">Produto</flux:heading>
                    <div class="space-y-2">
                        <div><flux:link href="#features" class="text-sm hover:text-white">Como funciona</flux:link></div>
                        <div><flux:link href="{{ route('register') }}" class="text-sm hover:text-white">Começar</flux:link></div>
                    </div>
                </div>

                <div class="space-y-3">
                    <flux:heading size="md" class="text-white">Empresa</flux:heading>
                    <div class="space-y-2">
                        <div><flux:text class="text-sm">Sobre</flux:text></div>
                        <div><flux:text class="text-sm">Contato</flux:text></div>
                    </div>
                </div>

                <div class="space-y-3">
                    <flux:heading size="md" class="text-white">Legal</flux:heading>
                    <div class="space-y-2">
                        <div><flux:text class="text-sm">Privacidade</flux:text></div>
                        <div><flux:text class="text-sm">Termos</flux:text></div>
                    </div>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-zinc-800 text-center">
                <flux:text variant="subtle" class="text-sm">
                    © {{ date('Y') }} BrunaWay. Todos os direitos reservados.
                </flux:text>
            </div>
        </div>
    </div>
</footer>
</div>
