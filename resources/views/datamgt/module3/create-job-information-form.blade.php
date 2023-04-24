<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Entreprise') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Ajouter un employeur") }}
        </p>
    </header>
    <form method='POST' action="{{ route('Entreprise.store') }}">
        @csrf
        <div>
            <x-text-input id="NomEntreprise" name="NomEntreprise" type="text" class="mt-1 block w-full" placeholder="Nom de l'entreprise"/>
            <x-text-input id="Adresse" name="Adresse" type="text" class="mt-1 block w-full" placeholder="Adresse"/>
            <x-text-input id="Date d'entrée" name="Date d'entrée" type="text" class="mt-1 block w-full" placeholder="Date d'entrée"/>
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

    <header>
        <h2 class="mt-3 text-lg font-medium text-gray-900">
            {{ __('Fiche de paye') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Ajouter les données d'une fiche de paye") }}
        </p>
    </header>


    <form method='POST' action="{{ route('FicheDePaye.store') }}">
        @csrf
        <div>
            <x-text-input id="Periode" name="Periode" type="date" class="mt-1 block w-full" placeholder="Période"/>
            <x-text-input id="SalaireBrut" name="SalaireBrut" type="decimal" class="mt-1 block w-full" placeholder="Salaire brut"/>
            <x-text-input id="SalaireNet" name="SalaireNet" type="decimal" class="mt-1 block w-full" placeholder="Salaire net"/>
            <x-text-input id="ChargeEmployeur" name="ChargeEmployeur" type="text" class="mt-1 block w-full" placeholder="Charge employeur"/>
            <x-text-input id="domaine_id" name="domaine_id" type="hidden" class="mt-1 block w-full" value=""/>
            <x-text-input id="entreprise_id" name="entreprise_id" type="hidden" class="mt-1 block w-full" value=""/>
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
