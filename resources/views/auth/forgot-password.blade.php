<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('img/logonoir.png') }}" alt="" width="140" height='90' class="mx-auto">
        </x-slot>

        <div class="">
            <h1 class="text-center subtitle" style="font-size: 2.2em; color: #bc111d; font-weight: bold;">
                Mot de passe oublié
            </h1>
        </div>

        <div class="mb-4 text-sm text-gray-600">
            {{ __("Mot de passe oublié ? Pas de problème. Faites-nous simplement savoir
                 votre adresse e-mail et nous vous enverrons un lien de
                réinitialisation de mot de passe par e-mail, qui vous permettra d'en choisir un nouveau.") }}
        </div>

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Lien de réinitialisation') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>