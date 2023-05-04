<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Inflation') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Ajouter un taux d/'inflation") }}
        </p>
    </header>
    <form method='POST' action="{{ route('Inflation.store') }}">
        @csrf
        <div>
            <x-text-input id="TauxMoyen" name="TauxMoyen" type="decimal" class="mt-1 block w-full" placeholder="Taux moyen"/>
            <x-text-input id="Annee" name="Annee" type="text" class="mt-1 block w-full" autocomplete="Annee" placeholder="Année"/>
            <x-text-input id="user_id" name="user_id" type="hidden" class="mt-1 block w-full" value="{{ Auth::user()->id }}"/>
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button class="mt-1 block">{{ __('Créer') }}</x-primary-button>
        </div>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600 font-semibold">
                {{ session('message') }}
            </div>
        @endif
    </form>
</section>
