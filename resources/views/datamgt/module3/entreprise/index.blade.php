<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Entreprise') }}
        </h2>
        <table>
            <tr>
                <x-table.td>{{ __("Liste de vos employeurs passé et actuel") }}</x-table.td>
                <x-table.td><x-aprimary-button :href="route('CompteBancaires.create')">{{ __('Créer') }}</x-aprimary-button></x-table.td>
            </tr>
        </table>
    </header>
    <x-table.table :headers="['id', 'Entreprise', 'Adresse', 'Date d\'entrée', ' ']">
        @foreach($Entreprises as $Entreprise)
            <tr class = "border-b">
                <x-table.td>{{ $Entreprise->id }}</x-table.td>
                <x-table.td>{{ $Entreprise->NomEntreprise }}</x-table.td>
                <x-table.td>{{ $Entreprise->Adresse }}</x-table.td>
                <x-table.td>{{ $Entreprise->created_at }}</x-table.td>
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