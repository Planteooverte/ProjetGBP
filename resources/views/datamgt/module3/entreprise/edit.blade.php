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
                    <div class="">Modification</div>
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
                                {{ __("Modifier une entreprise") }}
                            </p>
                        </header>
                        <form action="{{ route('Entreprises.update', $Entreprise->id) }}" method="POST">
                            @csrf
                            <div>
                                <x-text-input id="NomEntreprise" name="NomEntreprise" type="text" class="mt-1 block w-full" value="{{ old('NomEntreprise', $Entreprise->NomEntreprise) }}"/>
                                <x-text-input id="Adresse" name="Adresse" type="text" class="mt-1 block w-full" value="{{ old('Adresse', $Entreprise->Adresse) }}"/>
                                <x-text-input id="Date d'entrée" name="dateEntree" type="date" class="mt-1 block w-full" value="{{ old('dateEntree', $Entreprise->dateEntree) }}"/>
                                <x-text-input id="Date de sortie" name="dateSortie" type="date" class="mt-1 block w-full" value="{{ old('dateSortie', $Entreprise->dateSortie) }}"/>
                            </div>
                            @error('entreprise')
                                    <p class="help is-danger">{{ $message }}</p>
                            @enderror
                            <div class="flex items-center gap-4">
                                <x-primary-button class="mt-1 block">{{ __('Valider') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
