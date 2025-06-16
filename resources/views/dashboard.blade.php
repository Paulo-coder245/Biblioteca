<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- BOTOES DO DASHBOARD -->
        <div class="mb-4 flex gap-2 flex-wrap">
            <a href="{{ route('usuarios.create') }}" class="button button-orange">
                Cadastrar Usuário
            </a>
            <a href="{{ route('usuarios.index') }}" class="button button-orange">
                Ver Usuários
            </a>
            <a href="{{ route('livros.create') }}" class="button button-purple">
                Cadastrar Livro
            </a>
            <a href="{{ route('livros.index') }}" class="button button-purple">
                Ver Livros
            </a>
            <a href="{{ route('emprestimos.index') }}" class="button button-green">
                Empréstimos
            </a>
        </div>
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>
    </div>
</x-layouts.app>

<style>
.button {
    display: inline-block;
    margin: 12px 8px 0 0;
    color: #fff;
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: background-color 0.3s;
}

.button-orange {
    background-color: #f59e0b;
}
.button-orange:hover {
    background-color: #d97706;
}

.button-purple {
    background-color: #7c3aed;
}
.button-purple:hover {
    background-color: #5b21b6;
}

.button-green {
    background-color: #22c55e;
}
.button-green:hover {
    background-color: #15803d;
}
</style>