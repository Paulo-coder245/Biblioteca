<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- BOTOES DO DASHBOARD -->
        <div class="mb-4 flex gap-2">
            <a href="{{ route('usuarios.create') }}"
               class="inline-block rounded bg-blue-600 px-4 py-2 text-white font-semibold hover:bg-blue-700 transition">
                Cadastrar Usuário
            </a>
            <a href="{{ route('usuarios.index') }}"
               class="inline-block rounded bg-green-600 px-4 py-2 text-white font-semibold hover:bg-green-700 transition">
                Ver Usuários
            </a>
            <a href="{{ route('livros.create') }}"
               class="inline-block rounded bg-purple-600 px-4 py-2 text-white font-semibold hover:bg-purple-700 transition">
                Cadastrar Livro
            </a>
            <a href="{{ route('livros.index') }}"
               class="inline-block rounded bg-yellow-600 px-4 py-2 text-white font-semibold hover:bg-yellow-700 transition">
                Ver Livros
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