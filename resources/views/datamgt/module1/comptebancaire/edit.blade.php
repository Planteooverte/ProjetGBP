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
                        <form action="{{ route('CompteBancaires.update', $CompteBancaire->id) }}" method="POST">
                            @csrf
                            <div>
                                <x-text-input id="RefCompte" name="RefCompte" type="number" class="mt-1 block w-full" value="{{ old('RefCompte', $CompteBancaire->RefCompte) }}" placeholder="Numero du compte"/>
                                <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="Type" id="Type">
                                    <option disabled selected class="text-neutral-400">{{ old('Type', $CompteBancaire->Type) }}</option>
                                    <option value="Assurance Vie">Assurance Vie</option>
                                    <option value="Compte courant">Compte courant</option>
                                    <option value="Livret A">Livret A</option>
                                    <option value="PEE">PEE</option>
                                    <option value="PEL">PEL</option>
                                </select>
                                <x-text-input id="NomBanque" name="NomBanque" type="text" class="mt-1 block w-full" value="{{ old('NomBanque', $CompteBancaire->NomBanque) }}" placeholder="Banque"/>
                                <x-text-input id="Adresse" name="Adresse" type="text" class="mt-1 block w-full" value="{{ old('Adresse', $CompteBancaire->Adresse) }}" placeholder="Adresse"/>

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
