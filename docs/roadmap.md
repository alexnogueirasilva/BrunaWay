# BrunaWay — Backlog "Nível Ouro" (Evolução por Idade + Emancipação)
**Stack:** Laravel 12 + Livewire 4 + Flux UI + Tailwind + Alpine (mínimo)
**DB:** PostgreSQL (recomendado) ou MySQL
**Infra opcional:** Redis (queues/cache), S3 (anexos), Horizon (se usar filas)
**Formato:** Épicos → User Stories → Tasks técnicas → Critérios de aceite
**Nome do produto:** BrunaWay
**Princípio:** controle diminui com o tempo; autonomia aumenta com responsabilidade.

---

## 📊 Progresso Atual (Última atualização: 2026-01-16 02:20)

### ✅ Concluído
- **PHP 8.5.1** com features modernas (pipe operator, property hooks)
- **UUID** implementado em toda estrutura (users, families, tasks, schedules, daily_task_instances)
- **Trait HasFullTextSearch** com GIN index PostgreSQL + fallback SQLite/MySQL
- **Enums** organizados em `App\Enums`: Role, LifeStage, TaskType, Priority, TaskInstanceStatus (com labels, cores, métodos)
- **Migrations** completas:
  - families (UUID, soft deletes)
  - family_user (pivot com role, birthdate, life_stage, life_stage_locked)
  - tasks (com GIN fulltext index, type, priority, weight)
  - schedules (JSON days_of_week, time windows)
  - daily_task_instances (status tracking, completion timestamps)
- **Models** (final class, sem $fillable, usando Model::unguard()):
  - Family, Task, Schedule, DailyTaskInstance com relationships
  - User com helper methods (belongsToFamily, isParentInFamily, isChildInFamily)
- **DTOs** (final readonly class): TaskDTO, FamilyDTO com métodos toArray()
- **Actions** (final class): CreateTaskAction, UpdateTaskAction, DeleteTaskAction, CreateFamilyAction
- **Policies** multi-tenant:
  - FamilyPolicy, TaskPolicy, SchedulePolicy, DailyTaskInstancePolicy
  - Isolamento por family_id, parents têm full access, children access restrito
- **Seeders** com dados demo:
  - FamilySeeder (Família Silva, Maria - parent, João - child)
  - TaskSeeder (6 tarefas: escovar dentes, arrumar cama, dever de casa, organizar brinquedos, ler livro, praticar instrumento)
  - ScheduleSeeder (horários e dias da semana para cada tarefa)
- **Sidebar collapsible** implementado (desktop + mobile)
- **Internacionalização (i18n)** completa pt_BR/en
- **Landing page** profissional com Flux UI
- **Theme toggle** (dark/light mode)

### 🚧 Em Andamento
- Nenhum item em desenvolvimento no momento

### 📋 Próximos Passos
- Livewire components para CRUD de Tasks
- Action: GenerateDailyInstancesAction
- Command: routine:generate-daily
- Dashboard para Parents e Children
- Tela "Minha Família" para gerenciar membros

---

## 0) Convenções do projeto

### Papéis (Role)
- **Parent** (responsável)
- **Child** (filho/adolescente/jovem)

### Estágios de vida (Life Stage)
O estágio altera permissões, UX e regras financeiras.
- **KID**: 6–12 (controle direto)
- **TEEN**: 13–17 (participação + negociação)
- **YOUNG_ADULT**: 18+ (pais viram mentores)
- **INDEPENDENT**: 18+ + autonomia formal (pais sem acesso)

> Observação: a transição para **INDEPENDENT** exige 18+ **e** critérios de autonomia (ver Epic N).

### Entidades chave
- **Family** (grupo)
- **Task** (tarefa)
- **Schedule** (regra semanal/recorrência)
- **DailyTaskInstance** (instância do dia)
- **Proposal** (proposta da criança)
- **Allowance** (mesada/ajuda)
- **AllowanceReport** (relatório/cálculo)
- **LifeStageTransition** (histórico de mudança de estágio)
- **EmancipationRequest** (pedido de emancipação)
- **MentorMessage** (mentoria após 18)

### Políticas de produto (core)
- Criança **pode propor** mudanças.
- Pais **aprovam/recusam** até o estágio **TEEN**.
- 18+ muda o papel dos pais para **mentor** (sem poder de edição).
- Emancipação (INDEPENDENT) só ocorre com **18+** e critério de autonomia.
- Dinheiro evolui:
    - KID/TEEN: **mesada base + bônus**
    - YOUNG_ADULT: **ajuda acordada** (sem “punição” por checklist)
    - INDEPENDENT: sem vínculo financeiro automático

---

# Roadmap por Milestones

## Milestone M0 — Fundação (Auth, Família, UI base)
**Objetivo:** esqueleto navegável com Flux UI, multi-family, e contexto por papel.

### EPIC A — Fundação & Design System (Flux UI)
**User Story A1:** Como usuário, quero autenticar e ver a interface conforme meu papel.
**Tasks**
- [x] Setup Laravel 12 + Livewire 4 + Flux UI + Tailwind
- [x] Layout base (AppShell): Topbar, Sidebar (collapsible), Content
- [x] Componentes Flux UI padrões: buttons, badges, toasts, modals, tables, tabs
- [x] Autenticação (Fortify) com Livewire + 2FA
- [ ] Middleware de papel + contexto de família
- [ ] Seed: 1 Family, 1 Parent, 1 Child, tarefas demo
  **Critérios de aceite**
- Parent e Child fazem login e veem menus diferentes.
- Flux UI aplicado consistentemente em forms, tables e modals.

### EPIC B — Multi-tenant leve por Family
**User Story B1:** Como pai, quero associar contas à minha família.
**Tasks**
- [x] Migrations: families (UUID), family_user (com role, birthdate, life_stage)
- [x] Policies: Parent só acessa recursos da sua Family (FamilyPolicy, TaskPolicy, SchedulePolicy, DailyTaskInstancePolicy)
- [x] Scopes/Eloquent: filtros por family_id implementados (forFamily, forChild, etc)
- [x] Seeders com dados demo (1 Family, 1 Parent, 1 Child, 6 tarefas)
- [ ] Tela "Minha Família" (Parent): listar membros, vincular child existente
  **Critérios de aceite**
- Um Parent não enxerga dados de outra Family.
- Child só enxerga seus dados dentro da Family.

---

## Milestone M1 — Rotina base (Tasks, Schedules, Instâncias do dia)
**Objetivo:** checklist diário e editor de rotina.

### EPIC C — Tasks (CRUD) + Prioridades
**User Story C1:** Como pai, quero cadastrar tarefas com prioridade, peso e tipo.
**Tasks**
- [x] Migration: tasks (UUID, com GIN fulltext index para PostgreSQL)
- [x] Enum: TaskType (fixed/flexible/optional), Priority (high/medium/low)
- [x] Trait: HasFullTextSearch (PostgreSQL GIN + fallback SQLite/MySQL)
- [ ] Livewire: ParentTasksIndex (table Flux UI), ParentTaskForm (modal)
- [ ] Validações: título, tipo, prioridade, peso, duração padrão opcional
  **Critérios de aceite**
- Criar/editar/desativar tarefa.
- Peso e tipo aparecem na tabela com badges.

### EPIC D — Schedules (regras semanais) + Janelas
**User Story D1:** Como pai, quero definir quando a tarefa ocorre e sua janela permitida.
**Tasks**
- [x] Migration: schedules (days_of_week JSON, start_time, window_start/end etc.)
- [x] Model: Schedule com relationships, casts, scopes (forDay, active, forFamily)
- [x] Seeders: ScheduleSeeder com horários para as 6 tarefas demo
- [ ] Livewire: ParentRoutineEditor
    - Selecionar tarefa
    - Definir dias da semana
    - Horário sugerido (start_time) e janela (window)
- [ ] Validações: janela coerente, dias válidos
  **Critérios de aceite**
- Pai define: "Estudo seg-sex entre 15:00–19:00"
- Rotina semanal aparece consistente e clara.

### EPIC E — DailyTaskInstances (gerar e executar)
**User Story E1:** Como criança, quero ver o que tenho hoje e marcar como feito.
**Tasks**
- [x] Migration: daily_task_instances (com status tracking, completion timestamps)
- [x] Model: DailyTaskInstance com relationships, scopes (forFamily, forChild, forDate, pending, done)
- [x] Enum: TaskInstanceStatus (Pending, Done, Skipped, Cancelled) com countsForPerformance()
- [x] Model methods: markAsDone(), markAsSkipped(), cancel()
- [ ] Action: GenerateDailyInstancesAction (por dia e por child)
- [ ] Command: routine:generate-daily (scheduler)
- [ ] Livewire: ChildToday
    - Lista com checkbox
    - Progresso (x/y)
    - "Concluir" com timestamp
- [ ] Regras: cancelled não conta; skipped conta como não feito
  **Critérios de aceite**
- Gerar o dia baseado em schedules.
- Marcar "done" reflete em relatórios simples.

---

## Milestone M2 — Propostas (participação ativa) + Aprovação
**Objetivo:** criança propõe; pais decidem; mudanças aplicadas com rastreabilidade (KID/TEEN).

### EPIC F — Proposals (modelo + fluxo)
**User Story F1:** Como criança, quero propor mudança de horário/duração/troca.  
**Tasks**
- [ ] Migration: proposals (type, payload, impact, status, decision_reason)
- [ ] Livewire: ChildProposeChange (modal)
    - Tipos: change_time, change_duration, swap (MVP)
    - Campo “motivo” opcional
- [ ] Action: CreateProposalAction (impact básico)
    - valida janela e tarefa fixa
    - estima risco da meta semanal (heurística simples)
- [ ] Livewire: ChildProposals (lista + status)
  **Critérios de aceite**
- Criança cria proposta pendente.
- Proposta exibe impacto básico e status.

### EPIC G — Aprovação dos pais + aplicar mudanças
**User Story G1:** Como pai, quero aprovar/recusar propostas com 1 clique.  
**Tasks**
- [ ] Livewire: ParentApprovals (table Flux UI)
- [ ] Action: DecideProposalAction
    - approved: aplica no schedule/instance conforme tipo
    - rejected: salva reason
- [ ] Auditoria: parent_user_id + decided_at
  **Critérios de aceite**
- Ao aprovar, mudança aparece no “Hoje” da criança (se aplicável).
- Ao recusar, criança vê o motivo.

### EPIC H — Tickets de mudança (limite semanal)
**User Story H1:** Como pai, quero limitar quantas propostas a criança pode enviar por semana.  
**Tasks**
- [ ] Config em Allowance.rules (MVP)
- [ ] Policy/Rule: bloquear envio acima do limite
- [ ] UI: contador “tickets restantes”
  **Critérios de aceite**
- Ao exceder, app impede e explica.

---

## Milestone M3 — Mesada (base + bônus) + relatórios
**Objetivo:** cálculo transparente (KID/TEEN).

### EPIC I — Allowance Settings (pais)
**User Story I1:** Como pai, quero definir base e bônus e regras (dia coringa).  
**Tasks**
- [ ] Migration: allowances
- [ ] Livewire: ParentAllowanceSettings
    - base_amount, bonus_max, period (weekly/monthly)
    - dia coringa: 1/semana
    - tickets: N/semana
- [ ] Formatação moeda (centavos)
  **Critérios de aceite**
- Persistir base/bonus.
- UI com simulação básica.

### EPIC J — Cálculo e AllowanceReport
**User Story J1:** Como pai, quero ver performance e cálculo final do período.  
**Tasks**
- [ ] Migration: allowance_reports
- [ ] Action: CalculateAllowanceReportAction
    - soma pontos totais e concluídos
    - aplica dia coringa
    - bonus = bonus_max * completion_rate
    - final = base + bonus
- [ ] Command: routine:calculate-weekly (scheduler)
- [ ] Livewire: ParentReports (semana/mês)
- [ ] Livewire: ChildMyProgress (feedback neutro)
  **Critérios de aceite**
- Relatório mostra: pontos, %, base, bônus, final.
- Cancelled não reduz performance.

---

## Milestone M4 — Planejamento por blocos + replanejar
**Objetivo:** otimizar tempo sem virar robô (TEEN).

### EPIC K — Blocos + Replanejar
**User Story K1:** Como criança, quero replanejar o dia quando atrasar.  
**Tasks**
- [ ] Modelo opcional: day_blocks (ou inferir por tipo)
- [ ] Livewire: ChildReplanDay
    - mover tarefa dentro da janela (botões: “+30min”, “pra mais tarde”)
    - dividir estudo em 2 blocos (ex.: 90 → 45+45)
- [ ] Regra: se violar janela → vira proposta automática
  **Critérios de aceite**
- Criança reorganiza o dia sem quebrar regras.
- Violação gera proposta pendente.

---

## Milestone M5 — Interesses + recomendações curadas (sem IA ainda)
**Objetivo:** sugestões úteis e seguras por interesse e idade.

### EPIC L — Interesses
**User Story L1:** Como criança, quero selecionar meus interesses.  
**Tasks**
- [ ] Migrations: interests, child_interests
- [ ] Livewire: ChildProfileInterests
- [ ] Livewire: ParentViewInterests (somente leitura)
  **Critérios de aceite**
- Criança marca interesses; pais visualizam.

### EPIC M — Recomendações (curadas) com aprovação
**User Story M1:** Como pai, quero aprovar sugestões de livros/cursos por interesse e idade.  
**Tasks**
- [ ] Migration: recommendations (age_min, age_max, interest_id, type, title, description, link?)
- [ ] Seed de recomendações (curadas)
- [ ] Livewire: ParentRecommendations (aprovar/ocultar)
- [ ] Livewire: ChildRecommendations (somente aprovadas)
  **Critérios de aceite**
- Criança só vê recomendações aprovadas.
- Sem scraping no app (curadoria manual/seed).

---

# ✅ NOVO BLOCO — Evolução por Idade + Emancipação (do “mais novo” até o “mais velho”)

## Milestone M6 — Life Stages (KID/TEEN/YOUNG_ADULT/INDEPENDENT)
**Objetivo:** o app evolui automaticamente; permissões e fluxos mudam com a vida.

### EPIC N — Sistema de Estágios de Vida (LifeStage)
**User Story N1:** Como sistema, quero definir o estágio de vida do filho e aplicar regras automaticamente.  
**Tasks**
- [ ] Add colunas em users (ou profile): birthdate, life_stage, life_stage_locked (bool)
- [ ] Enum: LifeStage (KID, TEEN, YOUNG_ADULT, INDEPENDENT)
- [ ] Migration: life_stage_transitions (auditoria)
- [ ] Action: EvaluateLifeStageAction (calcula estágio com base na data de nascimento)
- [ ] Command: lifecycle:evaluate (scheduler mensal/diário)
- [ ] UI: Child/Parent exibem “Estágio atual” e data da próxima transição
  **Critérios de aceite**
- Mudança automática KID→TEEN e TEEN→YOUNG_ADULT ao atingir a idade.
- Toda transição registra histórico.

### EPIC O — Políticas dinâmicas por estágio
**User Story O1:** Como pai/filho, quero que permissões mudem conforme o estágio.  
**Tasks**
- [ ] Policies baseadas em (role + life_stage)
- [ ] Guard de rotas: ParentRoutes, ChildRoutes, MentorRoutes
- [ ] UI menus dinâmicos:
    - KID/TEEN: Parent controla tasks/schedules + approvals
    - YOUNG_ADULT: Parent perde edição; vira mentor
    - INDEPENDENT: Parent perde acesso total ao perfil do filho
- [ ] Testes Feature: permissões por estágio
  **Critérios de aceite**
- Ao virar YOUNG_ADULT, Parent não consegue mais criar/editar rotina do filho.
- Child mantém autogestão e vê histórico.

---

## Milestone M7 — Emancipação (18+ + autonomia) e desligamento parental
**Objetivo:** filho só se torna INDEPENDENT quando 18+ e critério de autonomia é atendido.

### EPIC P — Regras de autonomia (18+)
**Definição:** Para emancipar:
- Idade >= 18 **obrigatório**
- E pelo menos 1 condição:
    - Ajuda financeira registrada (contribuição mensal)
    - Mora fora (endereço/declaração)
    - “Declara independência” (com confirmação forte)
    - Pais aprovam emancipação manualmente

**User Story P1:** Como filho, quero solicitar emancipação quando eu tiver autonomia real.  
**Tasks**
- [ ] Migration: emancipation_requests (status, evidence, notes, decided_at, parent_decision)
- [ ] Livewire: ChildEmancipationRequest
    - checklists de critérios
    - anexos/evidências (opcional, fase 2; MVP: texto)
- [ ] Action: ValidateEmancipationEligibilityAction
    - valida idade >= 18
    - valida critérios selecionados
- [ ] Livewire: ParentEmancipationReview
    - aprovar, recusar, aprovar com transição (30 dias)
- [ ] Action: DecideEmancipationAction
    - approved => move life_stage para INDEPENDENT
    - transition => agenda mudança para 30 dias
- [ ] Auditoria completa (quem decidiu, quando, motivo)
  **Critérios de aceite**
- Com <18, o pedido é bloqueado e explicado.
- Com 18+ e critérios, pedido pode ser enviado.
- Ao aprovar, Parent perde acesso ao perfil do filho.

### EPIC Q — Modo de Transição (30 dias)
**User Story Q1:** Como família, quero uma transição suave para independência.  
**Tasks**
- [ ] Campo em emancipation_requests: transition_until
- [ ] UI: período de transição mostra:
    - Parent: visão somente leitura (sem edição) até a data final
    - Child: banner “Transição em andamento”
- [ ] Scheduler: aplicar INDEPENDENT quando transition_until chegar
  **Critérios de aceite**
- Durante transição, Parent não edita nada.
- Após a data, Parent perde acesso total.

---

## Milestone M8 — Modo Mentor (YOUNG_ADULT)
**Objetivo:** pais viram mentores: só comentários/incentivo, sem controle.

### EPIC R — Mentoria (mensagens e feedback)
**User Story R1:** Como pai, quero orientar sem controlar.  
**Tasks**
- [ ] Migration: mentor_messages (family_id, parent_id, child_id, content, created_at)
- [ ] Livewire: MentorInbox (Parent)
- [ ] Livewire: ChildMentorFeed
- [ ] Reações leves (👍/👏) (opcional)
- [ ] Settings: Child escolhe se quer “mentoria ativa” ou “somente emergências”
  **Critérios de aceite**
- No estágio YOUNG_ADULT, Parent não vê checklist nem define tarefas.
- Parent consegue mandar mensagens de mentoria.
- Child pode silenciar (com limites configuráveis).

---

## Milestone M9 — Finanças evolutivas (Mesada → Ajuda → Independência)
**Objetivo:** regras financeiras mudam com o estágio.

### EPIC S — Acordos financeiros (YOUNG_ADULT)
**User Story S1:** Como família, quero registrar ajuda financeira sem condicionar a checklist.  
**Tasks**
- [ ] Migration: financial_agreements (amount, frequency, notes, start/end)
- [ ] UI: ParentFinancialSupport (criar/encerrar acordo)
- [ ] UI: ChildFinancialOverview (somente leitura)
- [ ] Regras:
    - KID/TEEN: allowance_reports ativos
    - YOUNG_ADULT: allowance_reports desligados por padrão
    - INDEPENDENT: sem acordos vinculados automaticamente (apenas histórico)
      **Critérios de aceite**
- Ao entrar em YOUNG_ADULT, a mesada pode ser “convertida” para apoio acordado.
- Não existe penalidade por tarefas em YOUNG_ADULT (por padrão).

---

# NFR — Requisitos não funcionais (Nível Ouro)

## Segurança & Privacidade
- [ ] Policy por family_id em tudo
- [ ] Logs/auditoria em ações sensíveis (aprovações, emancipação, finanças)
- [ ] Rate limit em endpoints críticos
- [ ] Sem coleta desnecessária (dados mínimos)

## Performance
- [ ] Índices: (family_id, date), (child_user_id, date), (status)
- [ ] Cache opcional em dashboards (ParentReports)
- [ ] Jobs/commands via scheduler

## Qualidade
- [ ] Testes Feature (Pest) para:
    - isolamento Family
    - gerar instâncias
    - concluir tarefas
    - criar proposta e decidir
    - cálculo de mesada
    - transição de life_stage
    - emancipação (bloqueio <18 e aprovação 18+)
    - modo mentor (parent sem edição)

---

# C4 Model — Diagramas (Mermaid)

## C4 — Nível 1: Contexto
```mermaid
flowchart LR
  Parent[Parent/Responsável] -->|Configura (KID/TEEN), Mentora (18+)| App[BrunaWay Web App]
  Child[Filho/Adolescente/Jovem] -->|Executa, propõe, autogerencia| App
  App --> DB[(Database)]
  App --> Notif[Notificações (opcional)]
