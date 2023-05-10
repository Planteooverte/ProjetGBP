<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Fiche de paye') }}
        </h2>
        <x-aprimary-button :href="route('CompteBancaires.create')">{{ __('Créer') }}</x-aprimary-button>
    </header>
    <x-table.table :headers="['id', 'Periode', 'Salaire Brut', 'Salaire Net ', 'Entreprise']">
        @foreach($FicheDePayes as $FicheDePaye)
            <tr class = "border-b">
                <x-table.td>{{ $FicheDePaye->id }}</x-table.td>
                <x-table.td>{{ $FicheDePaye->Periode }}</x-table.td>
                <x-table.td>{{ $FicheDePaye->SalaireBrut }}</x-table.td>
                <x-table.td>{{ $FicheDePaye->NomEntreprise }}</x-table.td>
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