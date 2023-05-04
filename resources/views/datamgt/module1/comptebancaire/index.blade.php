<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Compte Bancaire') }}
        </h2>
        <table>
            <tr>
                <x-table.td>{{ __("Liste de vos comptes bancaires") }}</x-table.td>
                <x-table.td><x-aprimary-button :href="route('CompteBancaires.create')">{{ __('Créer') }}</x-aprimary-button></x-table.td>
            </tr>
        </table>
    </header>

    <x-table.table :headers="['id', 'Numero du compte', 'Banque', 'Adresse', ' ', ' ']">
        @foreach($CompteBancaires as $CompteBancaire)
            <tr class = "border-b">
                <x-table.td>{{ $CompteBancaire->id }}</x-table.td>
                <x-table.td>{{ $CompteBancaire->RefCompte }}</x-table.td>
                <x-table.td>{{ $CompteBancaire->NomBanque }}</x-table.td>
                <x-table.td>{{ $CompteBancaire->Adresse }}</x-table.td> 
                <x-table.td class="mt-1 block"><x-aorange-button :href="route('CompteBancaires.edit', $CompteBancaire->id)" >{{ __('Modifier') }}</x-aorange-button></x-table.td>
                <x-table.td class="mt-1 block"><x-adanger-button :href="route('CompteBancaires.destroy', $CompteBancaire->id)">{{ __('Supprimer') }}</x-adanger-button></x-table.td>
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