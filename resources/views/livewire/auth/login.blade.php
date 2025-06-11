<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Faça seu login')" :description="__('Insira seu e-mail e sua senha para acessar o site')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email')"
            type="email"
            required
            autofocus
            autocomplete="email"
            placeholder="email@exemplo.com"
        />

        <!-- Password -->
        <div class="relative">
            <flux:input
                wire:model="password"
                :label="__('Senha')"
                type="password"
                required
                autocomplete="current-password"
                :placeholder="__('Senha')"
                viewable
            />

            @if (Route::has('password.request'))
                <flux:link class="absolute end-0 top-0 text-sm" :href="route('password.request')" wire:navigate>
                    {{ __('Esqueceu sua senha?') }}
                </flux:link>
            @endif
        </div>

        <!-- Remember Me -->
        <flux:checkbox wire:model="remember" :label="__('Lembre-se de mim')" />

        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full">{{ __('Conectar-se') }}</flux:button>
        </div>
    </form>

    @if (Route::has('register'))
        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
            {{ __('Não possui uma conta?') }}
            <flux:link :href="route('register')" wire:navigate>{{ __('Inscreva-se') }}</flux:link>
        </div>
    @endif
</div>
