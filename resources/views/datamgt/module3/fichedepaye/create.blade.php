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
                    <div class="">Création</div>
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
                                {{ __("Ajouter une fiche de paye") }}
                            </p>
                        </header>
                        <form method='POST' action="{{ route('FichesDePaye.store') }}">
                            @csrf
                            <div>
                                <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="entreprise_id" id="entreprise_id">
                                <option disabled selected class="text-neutral-400">Employeur</option>
                                @foreach ($entreprises as $entreprise)
                                    <option value="{{$entreprise->id}}">{{$entreprise->NomEntreprise}}</option>
                                @endforeach
                                </select>
                                <x-text-input id="Période" name="Periode" type="text" class="mt-1 block w-full" placeholder="Période" onfocus="(this.type='date')"/>
                                <x-text-input id="SalaireBrut" name="SalaireBrut" type="number" step="0.01" class="mt-1 block w-full" placeholder="Salaire brut"/>
                                <x-text-input id="SalaireNet" name="SalaireNet" type="number" step="0.01" class="mt-1 block w-full" placeholder="Salaire net"/>
                                <x-text-input id="ChargeEmployeur" name="ChargeEmployeur" type="number" step="0.01" class="mt-1 block w-full" placeholder="Charge employeur"/>
                                <x-text-input id="domaine_id" name="domaine_id" type="hidden" class="mt-1 block w-full" value="{{ $domaine_id }}"/>                            </div>
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






