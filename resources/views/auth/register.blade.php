<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="/home">
                <img src="{{ asset('img/logonoir.png') }}" alt="Location de véhicules au Bénin" width="140" height='90'
                    class="mx-auto">
            </a>
        </x-slot>

        <div class="">
            <h1 class="text-center subtitle" style="font-size: 2.2em; color: #bc111d; font-weight: bold;">
                Inscription
            </h1>
        </div>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="first_name" value="{{ __('Prénoms') }}" />
                <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                    :value="old('first_name')" required autofocus autocomplete="first_name" placeholder='John' />
            </div>

            <div class="mt-4">
                <x-jet-label for="last_name" value="{{ __('Nom') }}" />
                <x-jet-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                    :value="old('last_name')" required autofocus autocomplete="last_name" placeholder='Doe' />
            </div>



            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" placeholder='johndoe@mail.fr' />
            </div>


            <div class="mt-4">
                <x-jet-label for="phone_number" value="{{ __('Numéro de téléphone') }}" />
                <x-jet-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                    :value="old('phone_number')" required autocomplete="Numéro de téléphone"
                    placeholder='+ XXX XXXXXXXX' />
            </div>
            <hr>

            <div class="mt-4">
                <x-jet-label for="username" value='{{ __("Nom d`utilisateur") }}' />
                <x-jet-input id=" username" class="block mt-1 w-full" type="text" name="username"
                    :value="old(' username')" required autofocus autocomplete="username" placeholder='johnDoe1' />
            </div>


            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Mot de passe') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmez le mot de passe') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" required />

                        <div class="ml-2">Oui j'accepte <a target="_blank" href="/cgu"
                                class="underline text-sm text-gray-600 hover:text-gray-900">les CGU</a>
                        </div>
                    </div>
                </x-jet-label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Vous avez déjà un compte ? cliquez ici') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Inscription') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>