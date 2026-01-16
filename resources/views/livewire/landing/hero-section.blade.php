<section class="relative min-h-screen flex items-center justify-center overflow-hidden" wire:transition>
    <div class="absolute inset-0 bg-gradient-to-br from-zinc-50 via-white to-blue-50/30 dark:from-zinc-950 dark:via-zinc-900 dark:to-blue-950/30"></div>

    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-[600px] h-[600px] bg-gradient-to-br from-blue-500/20 to-purple-500/20 dark:from-blue-400/10 dark:to-purple-400/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-[600px] h-[600px] bg-gradient-to-tr from-purple-500/20 to-indigo-500/20 dark:from-purple-400/10 dark:to-indigo-400/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-gradient-to-r from-blue-500/5 to-purple-500/5 dark:from-blue-400/5 dark:to-purple-400/5 rounded-full blur-3xl"></div>
    </div>

    <div class="absolute inset-0 bg-[linear-gradient(to_right,#80808008_1px,transparent_1px),linear-gradient(to_bottom,#80808008_1px,transparent_1px)] bg-[size:64px_64px]"></div>

    <div class="relative z-10 container mx-auto px-6 lg:px-8 py-20">
        <div class="max-w-6xl mx-auto text-center space-y-12">
            <div wire:transition class="animate-fade-in">
                <flux:badge size="lg" color="zinc" class="inline-flex items-center gap-2 shadow-lg shadow-zinc-900/5 dark:shadow-zinc-100/5 px-6 py-2">
                    <flux:icon.shield-check variant="micro" class="animate-pulse" />
                    {{ __('landing.hero.badge') }}
                </flux:badge>
            </div>
            <div class="space-y-6" wire:transition style="animation-delay: 0.1s;">
                <flux:heading size="xl" class="text-6xl md:text-8xl lg:text-9xl font-extrabold tracking-tight leading-[0.95] bg-gradient-to-br from-zinc-900 via-zinc-700 to-blue-900 dark:from-zinc-100 dark:via-zinc-300 dark:to-blue-100 bg-clip-text text-transparent drop-shadow-2xl">
                    {{ __('landing.hero.title') }}
                </flux:heading>

                <div class="max-w-3xl mx-auto space-y-4">
                    <flux:subheading size="lg" class="text-2xl md:text-3xl text-zinc-600 dark:text-zinc-400 leading-relaxed font-light">
                        {{ __('landing.hero.subtitle') }}
                    </flux:subheading>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-6 pt-8" wire:transition style="animation-delay: 0.2s;">
                <flux:button
                    href="{{ route('register') }}"
                    variant="primary"
                    size="base"
                    icon="arrow-right"
                    icon:trailing
                    class="w-full sm:w-auto px-8 py-4 text-lg font-semibold shadow-xl shadow-blue-500/25 hover:shadow-2xl hover:shadow-blue-500/40 hover:scale-105 transition-all duration-300 data-loading:opacity-50 data-loading:pointer-events-none"
                >
                    {{ __('landing.hero.cta_primary') }}
                </flux:button>

                <flux:button
                    href="#features"
                    variant="outline"
                    size="base"
                    icon="information-circle"
                    class="w-full sm:w-auto px-8 py-4 text-lg font-semibold hover:scale-105 transition-all duration-300 backdrop-blur-sm"
                >
                    {{ __('landing.hero.cta_secondary') }}
                </flux:button>
            </div>
            <div class="pt-12 flex flex-col items-center gap-6" wire:transition style="animation-delay: 0.3s;">
                <div class="flex items-center gap-4 bg-white/50 dark:bg-zinc-900/50 backdrop-blur-md rounded-full px-6 py-3 shadow-lg border border-zinc-200/50 dark:border-zinc-800/50">
                    <div class="flex -space-x-3">
                        @for($i = 1; $i <= 5; $i++)
                            <flux:avatar
                                size="sm"
                                class="ring-4 ring-white dark:ring-zinc-900 shadow-lg hover:scale-110 transition-transform duration-300"
                                src="https://i.pravatar.cc/150?img={{ $i }}"
                            />
                        @endfor
                    </div>
                    <div class="h-8 w-px bg-zinc-300 dark:bg-zinc-700"></div>
                    <flux:text variant="subtle" size="sm" class="text-base">
                        {{ __('landing.hero.social_proof') }}
                    </flux:text>
                </div>
                <div class="flex flex-wrap items-center justify-center gap-8 text-sm text-zinc-500 dark:text-zinc-500">
                    <div class="flex items-center gap-2">
                        <flux:icon.check-badge variant="solid" class="size-5 text-green-600 dark:text-green-500" />
                        <span>{{ __('landing.hero.trust_no_card') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <flux:icon.shield-check variant="solid" class="size-5 text-blue-600 dark:text-blue-500" />
                        <span>{{ __('landing.hero.trust_secure') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <flux:icon.sparkles variant="solid" class="size-5 text-purple-600 dark:text-purple-500" />
                        <span>{{ __('landing.hero.trust_free') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute bottom-12 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 animate-bounce">
        <flux:text variant="subtle" size="sm" class="text-xs uppercase tracking-widest">{{ __('landing.hero.discover_more') }}</flux:text>
        <flux:icon.chevron-down variant="outline" class="size-6 text-zinc-400" />
    </div>
</section>
