<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Relevé d\'imposition') }}
        </h2>
        <x-aprimary-button :href="route('CompteBancaires.create')">{{ __('Créer') }}</x-aprimary-button>
    </header>
    <x-table.table :headers="['id', 'Type', 'Année Fiscale', 'Montant', 'Taux']">
        @foreach($RelImpositions as $RelImposition)
            <tr class = "border-b">
                <x-table.td>{{ $RelImposition->id }}</x-table.td>
                <x-table.td>{{ $RelImposition->TypeImposition }}</x-table.td>
                <x-table.td>{{ $RelImposition->AnneeFiscal }}</x-table.td>
                <x-table.td>{{ $RelImposition->Montant }}</x-table.td>
                <x-table.td>{{ $RelImposition->TauxImposition }}</x-table.td>
                <x-table.td class="mt-1 block">{{ __('Modifier') }}</x-table.td>
                <x-table.td class="mt-1 block">{{ __('Supprimer') }}</x-table.td>
            </tr>
        @endforeach
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600 font-semibold">
                {{ session('message') }}
            </div>
        @endif
    </x-table.table> 
</section>