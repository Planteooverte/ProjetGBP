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
                                {{ __('Compte Bancaire') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Modifier un compte bancaire") }}
                            </p>
                        </header>
                        <form action="{{ route('RelImpositions.update', $RelImposition->id) }}" method="POST">
                            @csrf
                            <div>
                                <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="TypeImposition" id="TypeImposition" value="{{ old('TypeImposition', $RelImposition->TypeImposition) }}">
                                    <option disabled selected class="text-neutral-400">Type d'imposition</option>
                                    <option value="Impôt sur le revenue">Impôt sur le revenue</option>
                                    <option value="Taxe d'habitation">Taxe d'habitation</option>
                                    <option value="Taxe foncière">Taxe foncière</option>
                                </select>
                                <x-text-input id="AnneeFiscal" name="AnneeFiscal" type="date" class="mt-1 block w-full" value="{{ old('AnneeFiscal', $RelImposition->AnneeFiscal) }}" placeholder="Année fiscale"/>
                                <x-text-input id="Montant" name="Montant" type="number" step="0.01" class="mt-1 block w-full" value="{{ old('Montant', $RelImposition->Montant) }}" placeholder="Montant"/>
                                <x-text-input id="DateEtablissement" name="DateEtablissement" type="date" class="mt-1 block w-full" value="{{ old('DateEtablissement', $RelImposition->DateEtablissement) }}" placeholder="Date d'établissement"/>
                                <x-text-input id="TauxImposition" name="TauxImposition" type="number" step="0.01" class="mt-1 block w-full" value="{{ old('TauxImposition', $RelImposition->TauxImposition) }}" placeholder="Taux d'imposition"/>
                                <x-text-input id="RevenuFiscalDeReference" name="RevenuFiscalDeReference" type="number" step="0.01" class="mt-1 block w-full" value="{{ old('RevenuFiscalDeReference', $RelImposition->RevenuFiscalDeReference) }}" placeholder="Revenu"/>
                                <x-text-input id="NbrDePart" name="NbrDePart" type="number" class="mt-1 block w-full" value="{{ old('NbrDePart', $RelImposition->NbrDePart) }}" placeholder="Nombre de part"/>
                            </div>
                            @error('compteBancaire')
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
