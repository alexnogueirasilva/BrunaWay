<section class="relative min-h-[90vh] flex items-center justify-center overflow-hidden" wire:transition>
    <!-- Background gradient -->
    <div class="absolute inset-0 bg-gradient-to-br from-zinc-50 via-white to-zinc-100 dark:from-zinc-950 dark:via-zinc-900 dark:to-zinc-800"></div>

    <!-- Decorative elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-blue-500/10 dark:bg-blue-400/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-purple-500/10 dark:bg-purple-400/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 container mx-auto px-6 lg:px-8">
        <div class="max-w-5xl mx-auto text-center space-y-8">
            <!-- Badge -->
            <div wire:transition>
                <flux:badge size="lg" color="zinc" class="inline-flex items-center gap-2">
                    <flux:icon.shield-check variant="micro" />
                    Disciplina, Organização e Responsabilidade
                </flux:badge>
            </div>

            <!-- Main headline -->
            <div class="space-y-4" wire:transition>
                <flux:heading size="xl" class="text-5xl md:text-7xl font-bold tracking-tight bg-gradient-to-r from-zinc-900 via-zinc-700 to-zinc-900 dark:from-zinc-100 dark:via-zinc-300 dark:to-zinc-100 bg-clip-text text-transparent">
                    Forme adultos preparados<br>com método e clareza
                </flux:heading>

                <flux:subheading size="lg" class="text-xl md:text-2xl text-zinc-600 dark:text-zinc-400 max-w-3xl mx-auto">
                    Sistema de rotina familiar que ensina compromisso, organização e consequência desde cedo
                </flux:subheading>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4" wire:transition>
                <flux:button
                    href="{{ route('register') }}"
                    variant="primary"
                    size="base"
                    icon="arrow-right"
                    icon:trailing
                    class="w-full sm:w-auto data-loading:opacity-50 data-loading:pointer-events-none"
                >
                    Criar minha família
                </flux:button>

                <flux:button
                    href="#features"
                    variant="outline"
                    size="base"
                    icon="information-circle"
                    class="w-full sm:w-auto"
                >
                    Saiba mais
                </flux:button>
            </div>

            <!-- Social proof -->
            <div class="pt-8 flex flex-col items-center gap-4" wire:transition>
                <div class="flex items-center gap-2">
                    <div class="flex -space-x-2">
                        @for($i = 1; $i <= 4; $i++)
                            <flux:avatar
                                size="sm"
                                class="ring-2 ring-white dark:ring-zinc-900"
                                src="https://i.pravatar.cc/150?img={{ $i }}"
                            />
                        @endfor
                    </div>
                    <flux:text variant="subtle" size="sm">
                        <span class="font-semibold text-zinc-900 dark:text-zinc-100">+100 famílias</span> organizando suas rotinas
                    </flux:text>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <flux:icon.chevron-down variant="outline" class="size-6 text-zinc-400" />
    </div>
</section>
