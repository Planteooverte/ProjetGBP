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
                                {{ __('Domaines') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Ajouter un domaine") }}
                            </p>
                        </header>
                        <form method='POST' action="{{ route('Domaine.store') }}">
                            @csrf
                            <div>
                                <x-text-input id="NomDomaine" name="NomDomaine" type="text" class="mt-1 block w-full" autocomplete="NomDomaine" placeholder="Domaine de service"/>
                                <x-text-input id="Unite" name="Unite" type="text" class="mt-1 block w-full" autocomplete="Unite" placeholder="Unité"/>
                                <x-text-input id="user_id" name="user_id" type="hidden" class="mt-1 block w-full" value="{{ $userid }}"/>
                            </div>
                            @error('compteBancaire')
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