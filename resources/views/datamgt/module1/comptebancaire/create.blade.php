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
                                {{ __('Compte Bancaire') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Ajouter un compte bancaire") }}
                            </p>
                        </header>
                        <form method='POST' action="{{ route('CompteBancaire.store') }}">
                            @csrf
                            <div>
                                <x-text-input id="RefCompte" name="RefCompte" type="number" class="mt-1 block w-full" placeholder="Numero du compte"/>
                                <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="Type" id="Type">
                                    <option disabled selected class="text-neutral-400">Type de compte</option>
                                    <option value="Assurance Vie">Assurance Vie</option>
                                    <option value="Compte courant">Compte courant</option>
                                    <option value="Livret A">Livret A</option>
                                    <option value="PEE">PEE</option>
                                    <option value="PEL">PEL</option>
                                </select>
                                <x-text-input id="NomBanque" name="NomBanque" type="text" class="mt-1 block w-full" autocomplete="NomBanque" placeholder="Banque"/>
                                <x-text-input id="Adresse" name="Adresse" type="text" class="mt-1 block w-full" autocomplete="Adresse" placeholder="Adresse"/>
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
