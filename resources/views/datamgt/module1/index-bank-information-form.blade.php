<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Compte Bancaire') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Liste de vos comptes bancaires") }}
        </p>
    </header>
    <x-table.table :headers="['Numero du compte', 'Banque', 'Adresse']">
        @foreach($CompteBancaires as $CompteBancaire)
            <tr class = "border-b">
                <x-table.td>{{ $CompteBancaire->RefCompte }}</x-table.td>
                <x-table.td>{{ $CompteBancaire->NomBanque }}</x-table.td>
                <x-table.td>{{ $CompteBancaire->Adresse }}</x-table.td>
            </tr>
        @endforeach
    </x-table.table>   
</section>