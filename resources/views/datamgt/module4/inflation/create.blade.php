<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des données') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="">Création</div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Inflation') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Ajouter un taux d/'inflation") }}
                            </p>
                        </header>
                        <form method='POST' action="{{ route('Inflations.store') }}">
                            @csrf
                            <div>
                                <x-text-input id="TauxMoyen" name="TauxMoyen" type="number" step="0.01" class="mt-1 block w-full" placeholder="Taux moyen"/>
                                <x-text-input id="dateInflation" name="dateInflation" type="date" class="mt-1 block w-full" placeholder="Date d'inflation"/>
                                <x-text-input id="user_id" name="user_id" type="hidden" class="mt-1 block w-full" value="{{ $userid }}"/>
                            </div>
                            @error('inflation')
                                    <p class="help is-danger">{{ $message }}</p>
                            @enderror
                            <div class="flex items-center gap-4">
                                <x-primary-button class="mt-1 block">{{ __('Créer') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Inflation') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Ajouter un taux d/'inflation") }}
        </p>
    </header>
    <form method='POST' action="{{ route('Inflation.store') }}">
        @csrf
        <div>
            <x-text-input id="TauxMoyen" name="TauxMoyen" type="decimal" class="mt-1 block w-full" placeholder="Taux moyen"/>
            <x-text-input id="Annee" name="Annee" type="text" class="mt-1 block w-full" autocomplete="Annee" placeholder="Année"/>
            <x-text-input id="user_id" name="user_id" type="hidden" class="mt-1 block w-full" value="{{ Auth::user()->id }}"/>
        </div>
