<section class="py-24 bg-zinc-50 dark:bg-zinc-950 relative overflow-hidden">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="text-center max-w-3xl mx-auto mb-16" wire:transition>
                <flux:badge size="md" color="purple" class="mb-4">
                    <flux:icon.light-bulb variant="micro" />
                    Nossa Filosofia
                </flux:badge>

                <flux:heading size="xl" class="text-4xl md:text-5xl font-bold mb-4">
                    O que a BrunaWay ensina
                </flux:heading>

                <flux:text class="text-lg text-zinc-600 dark:text-zinc-400">
                    Não existe "vitimismo digital". Existe maturidade construída com método.
                </flux:text>
            </div>

            <flux:tab.group>
                <flux:tabs wire:model="activeTab" class="w-full">
                    <flux:tab name="values">
                        <flux:icon.academic-cap variant="micro" />
                        Valores
                    </flux:tab>
                    <flux:tab name="method">
                        <flux:icon.clipboard-document-list variant="micro" />
                        Método
                    </flux:tab>
                    <flux:tab name="results">
                        <flux:icon.trophy variant="micro" />
                        Resultados
                    </flux:tab>
                    <flux:tab name="who">
                        <flux:icon.user-group variant="micro" />
                        Para Quem
                    </flux:tab>
                </flux:tabs>

                <flux:tab.panel name="values">
                    <div class="grid md:grid-cols-2 gap-8 py-8">
                        <flux:card wire:transition class="space-y-4">
                            <div class="flex items-start gap-3">
                                <flux:icon.check-badge variant="solid" class="size-6 text-green-600 shrink-0 mt-1" />
                                <div>
                                    <flux:heading size="lg" class="mb-2">Compromisso</flux:heading>
                                    <flux:text variant="subtle">
                                        Aprenda a honrar o que prometeu. Palavra tem valor.
                                    </flux:text>
                                </div>
                            </div>
                        </flux:card>

                        <flux:card wire:transition class="space-y-4">
                            <div class="flex items-start gap-3">
                                <flux:icon.calendar-days variant="solid" class="size-6 text-blue-600 shrink-0 mt-1" />
                                <div>
                                    <flux:heading size="lg" class="mb-2">Organização</flux:heading>
                                    <flux:text variant="subtle">
                                        Estruture seu dia, suas prioridades, seu tempo.
                                    </flux:text>
                                </div>
                            </div>
                        </flux:card>

                        <flux:card wire:transition class="space-y-4">
                            <div class="flex items-start gap-3">
                                <flux:icon.scale variant="solid" class="size-6 text-purple-600 shrink-0 mt-1" />
                                <div>
                                    <flux:heading size="lg" class="mb-2">Consequência</flux:heading>
                                    <flux:text variant="subtle">
                                        Toda escolha gera resultado. Aprenda a relação entre esforço e recompensa.
                                    </flux:text>
                                </div>
                            </div>
                        </flux:card>

                        <flux:card wire:transition class="space-y-4">
                            <div class="flex items-start gap-3">
                                <flux:icon.shield-check variant="solid" class="size-6 text-amber-600 shrink-0 mt-1" />
                                <div>
                                    <flux:heading size="lg" class="mb-2">Responsabilidade</flux:heading>
                                    <flux:text variant="subtle">
                                        Assuma seus atos. Não existe culpa externa para falha interna.
                                    </flux:text>
                                </div>
                            </div>
                        </flux:card>
                    </div>
                </flux:tab.panel>

                <flux:tab.panel name="method">
                    <div class="py-8 space-y-6">
                        <flux:callout variant="default" icon="information-circle">
                            <flux:heading size="lg" class="mb-2">Rotina não é castigo. É ferramenta de formação.</flux:heading>
                            <flux:text>
                                A infância e a adolescência não são fases para improviso. São fases para formação de caráter, disciplina e responsabilidade.
                            </flux:text>
                        </flux:callout>

                        <div class="grid md:grid-cols-3 gap-6">
                            <flux:card wire:transition>
                                <div class="text-center space-y-3">
                                    <div class="mx-auto w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-xl">
                                        1
                                    </div>
                                    <flux:heading size="md">Definir</flux:heading>
                                    <flux:text variant="subtle" class="text-sm">
                                        Pais estabelecem regras, limites e responsabilidades
                                    </flux:text>
                                </div>
                            </flux:card>

                            <flux:card wire:transition>
                                <div class="text-center space-y-3">
                                    <div class="mx-auto w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-xl">
                                        2
                                    </div>
                                    <flux:heading size="md">Executar</flux:heading>
                                    <flux:text variant="subtle" class="text-sm">
                                        Filhos cumprem, registram e desenvolvem autonomia
                                    </flux:text>
                                </div>
                            </flux:card>

                            <flux:card wire:transition>
                                <div class="text-center space-y-3">
                                    <div class="mx-auto w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-xl">
                                        3
                                    </div>
                                    <flux:heading size="md">Acompanhar</flux:heading>
                                    <flux:text variant="subtle" class="text-sm">
                                        Sistema mostra fatos, evolução e consequências
                                    </flux:text>
                                </div>
                            </flux:card>
                        </div>
                    </div>
                </flux:tab.panel>

                <flux:tab.panel name="results">
                    <div class="py-8 grid md:grid-cols-2 gap-6">
                        <flux:card wire:transition>
                            <flux:heading size="lg" class="mb-4 flex items-center gap-2">
                                <flux:icon.arrow-trending-up class="size-5 text-green-600" />
                                Crescimento Pessoal
                            </flux:heading>
                            <ul class="space-y-3">
                                <li class="flex items-start gap-2">
                                    <flux:icon.check class="size-5 text-green-600 shrink-0 mt-0.5" />
                                    <flux:text variant="subtle">Maturidade emocional</flux:text>
                                </li>
                                <li class="flex items-start gap-2">
                                    <flux:icon.check class="size-5 text-green-600 shrink-0 mt-0.5" />
                                    <flux:text variant="subtle">Autodisciplina</flux:text>
                                </li>
                                <li class="flex items-start gap-2">
                                    <flux:icon.check class="size-5 text-green-600 shrink-0 mt-0.5" />
                                    <flux:text variant="subtle">Gestão do tempo</flux:text>
                                </li>
                                <li class="flex items-start gap-2">
                                    <flux:icon.check class="size-5 text-green-600 shrink-0 mt-0.5" />
                                    <flux:text variant="subtle">Senso de responsabilidade</flux:text>
                                </li>
                            </ul>
                        </flux:card>

                        <flux:card wire:transition>
                            <flux:heading size="lg" class="mb-4 flex items-center gap-2">
                                <flux:icon.users class="size-5 text-blue-600" />
                                Benefícios Familiares
                            </flux:heading>
                            <ul class="space-y-3">
                                <li class="flex items-start gap-2">
                                    <flux:icon.check class="size-5 text-blue-600 shrink-0 mt-0.5" />
                                    <flux:text variant="subtle">Menos conflitos</flux:text>
                                </li>
                                <li class="flex items-start gap-2">
                                    <flux:icon.check class="size-5 text-blue-600 shrink-0 mt-0.5" />
                                    <flux:text variant="subtle">Regras claras e respeitadas</flux:text>
                                </li>
                                <li class="flex items-start gap-2">
                                    <flux:icon.check class="size-5 text-blue-600 shrink-0 mt-0.5" />
                                    <flux:text variant="subtle">Comunicação objetiva</flux:text>
                                </li>
                                <li class="flex items-start gap-2">
                                    <flux:icon.check class="size-5 text-blue-600 shrink-0 mt-0.5" />
                                    <flux:text variant="subtle">Ambiente organizado</flux:text>
                                </li>
                            </ul>
                        </flux:card>
                    </div>
                </flux:tab.panel>

                <flux:tab.panel name="who">
                    <div class="py-8">
                        <flux:card wire:transition>
                            <flux:heading size="lg" class="mb-6">Para pais que entendem que:</flux:heading>
                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="space-y-4">
                                    <div class="flex items-start gap-3">
                                        <flux:icon.x-circle variant="solid" class="size-5 text-red-600 shrink-0 mt-0.5" />
                                        <div>
                                            <flux:text class="font-semibold">Disciplina não é opressão</flux:text>
                                            <flux:text variant="subtle" class="text-sm">É formação de caráter</flux:text>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <flux:icon.x-circle variant="solid" class="size-5 text-red-600 shrink-0 mt-0.5" />
                                        <div>
                                            <flux:text class="font-semibold">Regra não é abuso</flux:text>
                                            <flux:text variant="subtle" class="text-sm">É estrutura necessária</flux:text>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div class="flex items-start gap-3">
                                        <flux:icon.x-circle variant="solid" class="size-5 text-red-600 shrink-0 mt-0.5" />
                                        <div>
                                            <flux:text class="font-semibold">Limite não é trauma</flux:text>
                                            <flux:text variant="subtle" class="text-sm">É proteção e direção</flux:text>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <flux:icon.x-circle variant="solid" class="size-5 text-red-600 shrink-0 mt-0.5" />
                                        <div>
                                            <flux:text class="font-semibold">Consequência não é punição</flux:text>
                                            <flux:text variant="subtle" class="text-sm">É aprendizado real</flux:text>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </flux:card>
                    </div>
                </flux:tab.panel>
            </flux:tab.group>
        </div>
    </div>
</section>
