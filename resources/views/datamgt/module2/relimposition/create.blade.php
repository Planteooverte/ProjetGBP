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
                                {{ __('Relevé d\'imposition') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Ajouter un relevé d'imposition") }}
                            </p>
                        </header>
                        <form method='POST' action="{{ route('RelImpositions.store') }}">
                            @csrf
                            <div>
                                <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="TypeImposition" id="TypeImposition">
                                    <option disabled selected class="text-neutral-400">Type d'imposition</option>
                                    <option value="Impôt sur le revenue">Impôt sur le revenue</option>
                                    <option value="Taxe d'habitation">Taxe d'habitation</option>
                                    <option value="Taxe foncière">Taxe foncière</option>
                                </select>
                                <x-text-input id="AnneeFiscal" name="AnneeFiscal" type="text" class="mt-1 block w-full" placeholder="Année fiscale" onfocus="(this.type='date')"/>
                                <x-text-input id="Montant" name="Montant" type="number" step="0.01" class="mt-1 block w-full" placeholder="Montant"/>
                                <x-text-input id="DateEtablissement" name="DateEtablissement" type="text" step="0.01" class="mt-1 block w-full" placeholder="Date d'établissement" onfocus="(this.type='date')"/>
                                <x-text-input id="TauxImposition" name="TauxImposition" type="number" step="0.01" class="mt-1 block w-full" placeholder="Taux d'imposition"/>
                                <x-text-input id="RevenuFiscalDeReference" name="RevenuFiscalDeReference" type="number" step="0.01" class="mt-1 block w-full" placeholder="Revenu fiscal de référence"/>
                                <x-text-input id="NbrDePart" name="NbrDePart" type="number" class="mt-1 block w-full" placeholder="Nombre de part"/>
                                <x-text-input id="profil_imposition_id" name="profil_imposition_id" type="hidden" class="mt-1 block w-full" value="{{ $profil_imposition_id }}"/>
                                <x-text-input id="domaine_id" name="domaine_id" type="hidden" class="mt-1 block w-full" value="{{ $domaine_id }}"/>
                            </div>
                            @error('profilimposition')
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
