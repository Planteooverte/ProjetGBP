<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Inflations') }}
        </h2>
        <x-aprimary-button :href="route('Inflations.create')">{{ __('Créer') }}</x-aprimary-button>
    </header>

    <x-table.table :headers="['id', 'Taux', 'Année', ' ', ' ']">
        @foreach($Inflations as $Inflation)
            <tr class = "border-b">
                <x-table.td>{{ $Inflation->id }}</x-table.td>
                <x-table.td>{{ $Inflation->TauxMoyen }}</x-table.td>
                <x-table.td>{{ date('Y', strtotime($Inflation->dateInflation)) }}</x-table.td>

                <x-table.td class="mt-1 block"><x-aorange-button :href="route('Inflations.edit', $Inflation->id)" >{{ __('Modifier') }}</x-aorange-button></x-table.td>
                <x-table.td class="mt-1 block"><x-adanger-button :href="route('Inflations.destroy', $Inflation->id)">{{ __('Supprimer') }}</x-adanger-button></x-table.td>
            </tr>
        @endforeach
        <!-- Message de réussite -->
        @if (session()->has('message_inflation'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600 font-semibold">
                {{ session('message_inflation') }}
            </div>
        @endif
    </x-table.table>
</section>
