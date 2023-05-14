<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vos organismes') }}
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
                                {{ __('Entreprise') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Ajouter un employeur") }}
                            </p>
                        </header>
                        <form method='POST' action="{{ route('Entreprises.store') }}">
                            @csrf
                            <div>
                                <x-text-input id="NomEntreprise" name="NomEntreprise" type="text" class="mt-1 block w-full" placeholder="Nom de l'entreprise"/>
                                <x-text-input id="Adresse" name="Adresse" type="text" class="mt-1 block w-full" placeholder="Adresse"/>
                                <x-text-input id="Date d'entrée" name="dateEntree" type="text" class="mt-1 block w-full" placeholder="Date d'entrée" onfocus="(this.type='date')"/>
                                <x-text-input id="Date de sortie" name="dateSortie" type="text" class="mt-1 block w-full" placeholder="Date de sortie" onfocus="(this.type='date')"/>
                                <x-text-input id="user_id" name="user_id" type="hidden" class="mt-1 block w-full" value="{{ $userid }}"/>
                            </div>
                            @error('entreprise')
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
