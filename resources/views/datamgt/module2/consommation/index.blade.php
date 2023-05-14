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
                                {{ __('Consommation') }}
                            </h2>
                            <x-aprimary-button :href="route('Consommations.create')">{{ __('Créer') }}</x-aprimary-button>
                        </header>
                        <x-table.table :headers="['id', 'Date du relevé', 'Relevé compteur', 'Unité', 'Domaine', ' ']">
                            {{-- $i - Index de parcours des NomDomaines et unités transmis par le controleur --}}
                            @php($i=0)
                            @foreach($Consommations as $Consommation)
                                <tr class = "border-b">
                                    <x-table.td>{{ $Consommation->id }}</x-table.td>
                                    <x-table.td>{{ $Consommation->DateReleve }}</x-table.td>
                                    <x-table.td>{{ $Consommation->ReleveCompteur }}</x-table.td>
                                    <x-table.td>{{ $Domaines[$i]->Unite }}</x-table.td>
                                    <x-table.td>{{ $Domaines[$i]->NomDomaine }}</x-table.td>
                                    <x-table.td class="mt-1 block"><x-aorange-button :href="route('Consommations.edit', $Consommation->id)" >{{ __('Modifier') }}</x-aorange-button></x-table.td>
                                    <x-table.td class="mt-1 block"><x-adanger-button :href="route('Consommations.destroy', $Consommation->id)">{{ __('Supprimer') }}</x-adanger-button></x-table.td>
                                </tr>
                                @php($i++)
                            @endforeach
                            <!-- Message de réussite -->
                            @if (session()->has('message_consommation'))
                                <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600 font-semibold">
                                    {{ session('message_consommation') }}
                                </div>
                            @endif
                        </x-table.table>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

