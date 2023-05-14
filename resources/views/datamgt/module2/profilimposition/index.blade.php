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
                    <div class="">Consultation</div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Profil Imposition') }}
                            </h2>
                            @if($NbrProfilImposition>=1)
                            @else
                                <x-aprimary-button :href="route('ProfilImpositions.create')">{{ __('Créer') }}</x-aprimary-button>
                            @endif
                        </header>

                        <x-table.table :headers="['id', 'Numero Fiscal', ' ', ' ', ' ', ' ']">
                            @foreach($ProfilImpositions as $ProfilImposition)
                                <tr class = "border-b">
                                    <x-table.td>{{ $ProfilImposition->id }}</x-table.td>
                                    <x-table.td>{{ $ProfilImposition->NumeroFiscal }}</x-table.td>
                                    <x-table.td class="mt-1 block"><x-aorange-button :href="route('ProfilImpositions.edit', $ProfilImposition->id)" >{{ __('Modifier') }}</x-aorange-button></x-table.td>
                                    <x-table.td class="mt-1 block"><x-adanger-button :href="route('ProfilImpositions.destroy', $ProfilImposition->id)">{{ __('Supprimer') }}</x-adanger-button></x-table.td>
                                </tr>
                            @endforeach
                            <!-- Message de réussite -->
                            @if (session()->has('message_profilimposition'))
                                <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600 font-semibold">
                                    {{ session('message_profilimposition') }}
                                </div>
                            @endif
                        </x-table.table>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

