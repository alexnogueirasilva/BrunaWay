<div>
<section class="py-24 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 relative overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute inset-0 overflow-hidden opacity-20">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-white rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-6 lg:px-8 relative z-10">
        <div class="max-w-4xl mx-auto text-center space-y-8" wire:transition>
            <!-- Badge -->
            <div>
                <flux:badge size="lg" color="white" class="inline-flex items-center gap-2">
                    <flux:icon.rocket-launch variant="micro" />
                    Comece agora
                </flux:badge>
            </div>

            <!-- Headline -->
            <div class="space-y-4">
                <flux:heading size="xl" class="text-5xl md:text-6xl font-bold text-white">
                    BrunaWay não é um app<br>para agradar crianças
                </flux:heading>

                <flux:text class="text-xl md:text-2xl text-white/90 max-w-2xl mx-auto">
                    É um sistema para formar adultos.
                </flux:text>
            </div>

            <!-- Benefits -->
            <div class="grid md:grid-cols-3 gap-6 pt-8">
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20" wire:transition>
                    <flux:icon.shield-check variant="solid" class="size-10 text-white mx-auto mb-3" />
                    <flux:heading size="md" class="text-white mb-2">Seguro</flux:heading>
                    <flux:text variant="subtle" class="text-white/80 text-sm">
                        Ambiente familiar fechado, sem exposição pública
                    </flux:text>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20" wire:transition>
                    <flux:icon.chart-bar variant="solid" class="size-10 text-white mx-auto mb-3" />
                    <flux:heading size="md" class="text-white mb-2">Completo</flux:heading>
                    <flux:text variant="subtle" class="text-white/80 text-sm">
                        Rotina, mesada, relatórios e acompanhamento
                    </flux:text>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20" wire:transition>
                    <flux:icon.academic-cap variant="solid" class="size-10 text-white mx-auto mb-3" />
                    <flux:heading size="md" class="text-white mb-2">Educativo</flux:heading>
                    <flux:text variant="subtle" class="text-white/80 text-sm">
                        Método comprovado de formação de caráter
                    </flux:text>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-8">
                <flux:button
                    href="{{ route('register') }}"
                    size="base"
                    class="w-full sm:w-auto bg-white text-blue-600 hover:bg-zinc-100 font-semibold data-loading:opacity-50 data-loading:pointer-events-none"
                    icon="arrow-right"
                    icon:trailing
                >
                    Criar minha família gratuitamente
                </flux:button>

                @auth
                    <flux:button
                        href="{{ url('/dashboard') }}"
                        variant="outline"
                        size="base"
                        class="w-full sm:w-auto border-white text-white hover:bg-white/10"
                        icon="home"
                    >
                        Ir para o Dashboard
                    </flux:button>
                @else
                    <flux:button
                        href="{{ route('login') }}"
                        variant="outline"
                        size="base"
                        class="w-full sm:w-auto border-white text-white hover:bg-white/10"
                        icon="arrow-right-end-on-rectangle"
                    >
                        Já tenho conta
                    </flux:button>
                @endauth
            </div>

            <!-- Trust indicators -->
            <div class="pt-8 space-y-3">
                <div class="flex items-center justify-center gap-2 text-white/80">
                    <flux:icon.check-circle variant="solid" class="size-5" />
                    <flux:text class="text-sm text-white/90">Sem cartão de crédito necessário</flux:text>
                </div>
                <div class="flex items-center justify-center gap-2 text-white/80">
                    <flux:icon.lock-closed variant="solid" class="size-5" />
                    <flux:text class="text-sm text-white/90">Seus dados sempre protegidos</flux:text>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-zinc-900 text-zinc-400 py-12">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="space-y-4">
                    <flux:heading size="lg" class="text-white">BrunaWay</flux:heading>
                    <flux:text variant="subtle" class="text-sm">
                        Disciplina, organização e responsabilidade para formar adultos preparados.
                    </flux:text>
                </div>

                <!-- Product -->
                <div class="space-y-3">
                    <flux:heading size="md" class="text-white">Produto</flux:heading>
                    <div class="space-y-2">
                        <div><flux:link href="#features" class="text-sm hover:text-white">Como funciona</flux:link></div>
                        <div><flux:link href="{{ route('register') }}" class="text-sm hover:text-white">Começar</flux:link></div>
                    </div>
                </div>

                <!-- Company -->
                <div class="space-y-3">
                    <flux:heading size="md" class="text-white">Empresa</flux:heading>
                    <div class="space-y-2">
                        <div><flux:text class="text-sm">Sobre</flux:text></div>
                        <div><flux:text class="text-sm">Contato</flux:text></div>
                    </div>
                </div>

                <!-- Legal -->
                <div class="space-y-3">
                    <flux:heading size="md" class="text-white">Legal</flux:heading>
                    <div class="space-y-2">
                        <div><flux:text class="text-sm">Privacidade</flux:text></div>
                        <div><flux:text class="text-sm">Termos</flux:text></div>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="mt-12 pt-8 border-t border-zinc-800 text-center">
                <flux:text variant="subtle" class="text-sm">
                    © {{ date('Y') }} BrunaWay. Todos os direitos reservados.
                </flux:text>
            </div>
        </div>
    </div>
</footer>
</div>
