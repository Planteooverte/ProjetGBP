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
                <x-table.td class="mt-1 block"><x-aorange-button :href="route('Domaines.edit', $Domaine->id)" >{{ __('Modifier') }}</x-aorange-button></x-table.td>
                <x-table.td class="mt-1 block"><x-adanger-button :href="route('Domaines.destroy', $Domaine->id)" >{{ __('Supprimer') }}</x-adanger-button></x-table.td>

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
