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
                            {{ __('Domaines') }}
                        </h2>
                        <x-aprimary-button :href="route('Domaines.create')">{{ __('Créer') }}</x-aprimary-button>
                    </header>

                    <x-table.table :headers="['id', 'Service/Obligation', 'Unité', ' ', ' ', ' ']">
                         @foreach($Domaines as $Domaine)
                            <tr class = "border-b">
                                <x-table.td>{{ $Domaine->id }}</x-table.td>
                                <x-table.td>{{ $Domaine->NomDomaine }}</x-table.td>
                                <x-table.td>{{ $Domaine->Unite }}</x-table.td>
                                @if ($Domaine->Lock == False)
                                    <x-table.td class="mt-1 block"><x-aorange-button :href="route('Domaines.edit', $Domaine->id)">{{ __('Modifier') }}</x-aorange-button></x-table.td>
                                    <x-table.td class="mt-1 block"><x-adanger-button :href="route('Domaines.destroy', $Domaine->id)">{{ __('Supprimer') }}</x-adanger-button></x-table.td>
                                @else
                                    <x-table.td class="mt-1 block"><img width="50" height="50" src="https://img.icons8.com/3d-fluency/94/lock-2.png" alt="lock-2"/></x-table.td>
                                    <x-table.td class="mt-1 block"><img width="50" height="50" src="https://img.icons8.com/3d-fluency/94/lock-2.png" alt="lock-2"/></x-table.td>
                                @endif
                            </tr>
                        @endforeach
                        <!-- Message de réussite -->
                        @if (session()->has('message_domaine'))
                            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600 font-semibold">
                                {{ session('message_domaine') }}
                            </div>
                        @endif
                    </x-table.table>
                </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



