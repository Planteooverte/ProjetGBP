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
                    <div class="">Consultation</div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Relevé d\'imposition') }}
                            </h2>
                            <x-aprimary-button :href="route('RelImpositions.create')">{{ __('Créer') }}</x-aprimary-button>
                        </header>
                        <x-table.table :headers="['id', 'Type', 'Année Fiscale', 'Montant', 'Date d\'établissement', 'Taux', 'Revenu', 'Nombre de part']">
                            @foreach($RelImpositions as $RelImposition)
                                <tr class = "border-b">
                                    <x-table.td>{{ $RelImposition->id }}</x-table.td>
                                    <x-table.td>{{ $RelImposition->TypeImposition }}</x-table.td>
                                    <x-table.td>{{ date('Y', strtotime($RelImposition->AnneeFiscal)) }}</x-table.td>
                                    <x-table.td>{{ $RelImposition->Montant }}</x-table.td>
                                    <x-table.td>{{ $RelImposition->DateEtablissement }}</x-table.td>
                                    <x-table.td>{{ $RelImposition->TauxImposition }}</x-table.td>
                                    <x-table.td>{{ $RelImposition->RevenuFiscalDeReference }}</x-table.td>
                                    <x-table.td>{{ $RelImposition->NbrDePart }}</x-table.td>
                                    <x-table.td class="mt-1 block"><x-aorange-button :href="route('RelImpositions.edit', $RelImposition->id)" >{{ __('Modifier') }}</x-aorange-button></x-table.td>
                                    <x-table.td class="mt-1 block"><x-adanger-button :href="route('RelImpositions.destroy', $RelImposition->id)">{{ __('Supprimer') }}</x-adanger-button></x-table.td>
                                </tr>
                            @endforeach
                            <!-- Message de réussite -->
                            @if (session()->has('message_relimposition'))
                                <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600 font-semibold">
                                    {{ session('message_relimposition') }}
                                </div>
                            @endif
                        </x-table.table>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


