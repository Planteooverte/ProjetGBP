<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vos fichiers') }}
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
                                {{ __('Fichier déposé') }}
                            </h2>
                            <x-aprimary-button :href="route('FichierCsvs.create')">{{ __('Créer') }}</x-aprimary-button>
                        </header>

                        <x-table.table :headers="['id', 'Nom du Fichier', 'Date de dépôt', ' ', ' ']">
                            @foreach($FichierCsvs as $FichierCsv)
                                <tr class = "border-b">
                                    <x-table.td>{{ $FichierCsv->id }}</x-table.td>
                                    <x-table.td>{{ $FichierCsv->NomFichier }}</x-table.td>
                                    <x-table.td>{{ $FichierCsv->created_at }}</x-table.td>
                                    <x-table.td class="mt-1 block"><x-aorange-button :href="route('FichierCsvs.destroy', $FichierCsv->id)" >{{ __('Supprimer') }}</x-aorange-button></x-table.td>
                                    <x-table.td class="mt-1 block"><x-adanger-button :href="route('FichierCsvs.destroy', $FichierCsv->id)">{{ __('Supprimer') }}</x-adanger-button></x-table.td>
                                </tr>
                            @endforeach
                            <!-- Message de réussite -->
                            @if (session()->has('message_fichier'))
                                <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600 font-semibold">
                                    {{ session('message_fichier') }}
                                </div>
                            @endif
                        </x-table.table>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

