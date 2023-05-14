<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vos relevés') }}
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
                                {{ __('Fiche de paye') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Modifier une fiche de paye") }}
                            </p>
                        </header>
                        <form action="{{ route('FichesDePaye.update', $FicheDePaye->id) }}" method="POST">
                            @csrf
                            <div>
                                <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="entreprise_id " id="entreprise_id ">
                                <option disabled selected class="text-neutral-400">Employeur</option>
                                @foreach ($entreprises as $entreprise )
                                    <option value="$entreprise->NomEntreprise">{{ $entreprise->NomEntreprise }}</option>
                                @endforeach
                                </select>
                                <x-text-input id="Periode" name="Periode" type="date" class="mt-1 block w-full" value="{{ old('Periode', $FicheDePaye->Periode) }}"/>
                                <x-text-input id="SalaireBrut" name="SalaireBrut" type="number" step="0.01" class="mt-1 block w-full" value="{{ old('SalaireBrut', $FicheDePaye->SalaireBrut) }}"/>
                                <x-text-input id="SalaireNet" name="SalaireNet" type="number" step="0.01" class="mt-1 block w-full" value="{{ old('SalaireNet', $FicheDePaye->SalaireNet) }}"/>
                                <x-text-input id="ChargeEmployeur" name="ChargeEmployeur" type="number" step="0.01" class="mt-1 block w-full" value="{{ old('ChargeEmployeur', $FicheDePaye->ChargeEmployeur) }}"/>
                                <x-text-input id="domaine_id" name="domaine_id" type="hidden" class="mt-1 block w-full" value="{{ $domaine_id }}"/>
                                <x-text-input id="entreprise_id" name="entreprise_id" type="hidden" class="mt-1 block w-full" value="{{ $entreprise->id }}"/>
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
