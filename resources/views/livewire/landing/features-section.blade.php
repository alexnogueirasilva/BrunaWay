<section id="features" class="py-24 bg-white dark:bg-zinc-900 relative overflow-hidden">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-3xl mx-auto mb-16" wire:transition>
                <flux:badge size="md" color="blue" class="mb-4">
                    <flux:icon.sparkles variant="micro" />
                    Como funciona
                </flux:badge>

                <flux:heading size="xl" class="text-4xl md:text-5xl font-bold mb-4">
                    Educação com responsabilidade
                </flux:heading>

                <flux:text class="text-lg text-zinc-600 dark:text-zinc-400">
                    Organize, acompanhe e forme. Três passos para transformar rotina em disciplina.
                </flux:text>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <flux:card wire:transition wire:intersect.once class="hover:shadow-lg transition-shadow">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                            <flux:icon.cog variant="solid" class="size-6 text-blue-600 dark:text-blue-400" />
                        </div>
                        <flux:heading size="lg">Pais definem regras</flux:heading>
                    </div>

                    <flux:text variant="subtle">
                        Crie rotinas, horários, prioridades e responsabilidades. Você define como a casa funciona.
                    </flux:text>
                </flux:card>
                <flux:card wire:transition wire:intersect.once class="hover:shadow-lg transition-shadow">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
                            <flux:icon.check-circle variant="solid" class="size-6 text-green-600 dark:text-green-400" />
                        </div>
                        <flux:heading size="lg">Filhos executam</flux:heading>
                    </div>

                    <flux:text variant="subtle">
                        Marcam o que foi feito, aprendem a se organizar e entendem o próprio desempenho.
                    </flux:text>
                </flux:card>
                <flux:card wire:transition wire:intersect.once class="hover:shadow-lg transition-shadow">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                            <flux:icon.chart-bar variant="solid" class="size-6 text-purple-600 dark:text-purple-400" />
                        </div>
                        <flux:heading size="lg">Sistema mostra resultados</flux:heading>
                    </div>

                    <flux:text variant="subtle">
                        Registro, histórico e consequência. Sem discurso emocional, apenas fatos.
                    </flux:text>
                </flux:card>

                <flux:card wire:transition wire:intersect.once class="hover:shadow-lg transition-shadow">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-3 bg-amber-100 dark:bg-amber-900/30 rounded-lg">
                            <flux:icon.currency-dollar variant="solid" class="size-6 text-amber-600 dark:text-amber-400" />
                        </div>
                        <flux:heading size="lg">Sistema financeiro claro</flux:heading>
                    </div>

                    <flux:text variant="subtle">
                        Mesada não é presente, é resultado. Valor base, bônus por desempenho e regras fixas.
                    </flux:text>
                </flux:card>

                <flux:card wire:transition wire:intersect.once class="hover:shadow-lg transition-shadow">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-3 bg-rose-100 dark:bg-rose-900/30 rounded-lg">
                            <flux:icon.eye variant="solid" class="size-6 text-rose-600 dark:text-rose-400" />
                        </div>
                        <flux:heading size="lg">Supervisão familiar</flux:heading>
                    </div>

                    <flux:text variant="subtle">
                        Acompanhe tudo em tempo real. Onde há evolução, onde há falha recorrente.
                    </flux:text>
                </flux:card>

                <flux:card wire:transition wire:intersect.once class="hover:shadow-lg transition-shadow">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-3 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg">
                            <flux:icon.arrow-trending-up variant="solid" class="size-6 text-indigo-600 dark:text-indigo-400" />
                        </div>
                        <flux:heading size="lg">Cresce com a idade</flux:heading>
                    </div>

                    <flux:text variant="subtle">
                        Conforme cresce, o controle diminui e a autonomia aumenta. Até não precisar mais.
                    </flux:text>
                </flux:card>
            </div>
        </div>
    </div>
</section>
