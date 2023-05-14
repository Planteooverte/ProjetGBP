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
                                {{ __('Fiche de paye') }}
                            </h2>
                            <x-aprimary-button :href="route('FichesDePaye.create')">{{ __('Créer') }}</x-aprimary-button>
                        </header>
                        <x-table.table :headers="['id', 'Periode', 'Salaire Brut', 'Salaire Net ', 'Charge Employeur', 'Entreprise']">
                            {{-- $i - Index de parcours des NomEntreprises transmis par le controleur --}}
                            @php($i=0)
                            @foreach($FicheDePayes as $FicheDePaye)
                                <tr class = "border-b">
                                    <x-table.td>{{ $FicheDePaye->id }}</x-table.td>
                                    <x-table.td>{{ $FicheDePaye->Periode }}</x-table.td>
                                    <x-table.td>{{ $FicheDePaye->SalaireBrut }}</x-table.td>
                                    <x-table.td>{{ $FicheDePaye->SalaireNet }}</x-table.td>
                                    <x-table.td>{{ $FicheDePaye->ChargeEmployeur }}</x-table.td>
                                    <x-table.td>{{ $NomEntreprises[$i]}}</x-table.td>
                                    <x-table.td class="mt-1 block"><x-aorange-button :href="route('FichesDePaye.edit', $FicheDePaye->id)" >{{ __('Modifier') }}</x-aorange-button></x-table.td>
                                    <x-table.td class="mt-1 block"><x-adanger-button :href="route('FichesDePaye.destroy', $FicheDePaye->id)">{{ __('Supprimer') }}</x-adanger-button></x-table.td>
                                </tr>
                                @php($i++)
                            @endforeach
                            <!-- Message de réussite -->
                            @if (session()->has('message_fichedepaye'))
                                <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600 font-semibold">
                                    {{ session('message_fichedepaye') }}
                                </div>
                            @endif
                        </x-table.table>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


