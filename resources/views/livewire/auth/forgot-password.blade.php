 <div class="flex flex-col gap-6">
    <x-auth-header :title="__('Resetar senha')" :description="__('Insira seu email para receber um link de reset da senha')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email')"
            type="email"
            required
            autofocus
            placeholder="email@exemplo.com"
            viewable
        />

        <flux:button variant="primary" type="submit" class="w-full">{{ __('Link de reset da senha') }}</flux:button>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-400">
        {{ __('Ou, retornar para') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('log in') }}</flux:link>
    </div>
</div>
