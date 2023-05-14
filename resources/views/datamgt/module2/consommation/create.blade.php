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
                                {{ __('Consommation') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Ajouter une consommation") }}
                            </p>
                        </header>
                        <form method='POST' action="{{ route('Consommations.store') }}">
                            @csrf
                            <div>
                                <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="domaine_id" id="domaine_id">
                                <option disabled selected class="text-neutral-400">Domaine</option>
                                @foreach ($Domaines as $Domaine)
                                    <option value="{{$Domaine->id}}">{{$Domaine->NomDomaine.__(' (en ').$Domaine->Unite.__(')')}}</option>
                                @endforeach
                                </select>
                                <x-text-input id="DateReleve" name="DateReleve" type="text" class="mt-1 block w-full" placeholder="Date du relevé" onfocus="(this.type='date')"/>
                                <x-text-input id="ReleveCompteur" name="ReleveCompteur" type="number" step="0.01" class="mt-1 block w-full" placeholder="Relevé compteur consommée"/>
                            </div>
                            @error('consommation')
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
