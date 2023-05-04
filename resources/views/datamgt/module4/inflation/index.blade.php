<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Inflations') }}
        </h2>
        <table>
            <tr>
                <x-table.td>{{ __("Suivi du taux d'inflation annuel") }}</x-table.td>
                <x-table.td><x-aprimary-button :href="route('CompteBancaires.create')">{{ __('Créer') }}</x-aprimary-button></x-table.td>
            </tr>
        </table>
    </header>

    <x-table.table :headers="['id', 'Taux', 'Année', ' ', ' ']">
        @foreach($Inflations as $Inflation)
            <tr class = "border-b">
                <x-table.td>{{ $Inflation->id }}</x-table.td>
                <x-table.td>{{ $Inflation->TauxMoyen }}</x-table.td>
                <x-table.td>{{ $Inflation->Annee }}</x-table.td>
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
