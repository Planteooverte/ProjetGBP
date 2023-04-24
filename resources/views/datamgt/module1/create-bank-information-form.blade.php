<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Compte Bancaire') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Ajouter un compte bancaire") }}
        </p>
    </header>
    <form method='POST' action="{{ route('CompteBancaire.store') }}">
        @csrf
        <div>
            <x-text-input id="RefCompte" name="RefCompte" type="number" class="mt-1 block w-full" placeholder="Numero du compte"/>
            <x-text-input id="NomBanque" name="NomBanque" type="text" class="mt-1 block w-full" autocomplete="NomBanque" placeholder="Banque"/>
            <x-text-input id="Adresse" name="Adresse" type="text" class="mt-1 block w-full" autocomplete="Adresse" placeholder="Adresse"/>
            <x-text-input id="user_id" name="user_id" type="hidden" class="mt-1 block w-full" value="{{ Auth::user()->id }}"/>
        </div>
        @error('compteBancaire')
                <p class="help is-danger">{{ $message }}</p>
        @enderror
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
            {{ __('Domaine') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Ajouter un domaine de service") }}
        </p>
    </header>
    <form method='POST' action="{{ route('Domaine.store') }}">
        @csrf
        <div>
            <x-text-input id="Annee" name="Annee" type="date" class="mt-1 block w-full" autocomplete="Annee" placeholder="Année"/>
            <x-text-input id="NomDomaine" name="NomDomaine" type="text" class="mt-1 block w-full" autocomplete="NomDomaine" placeholder="Domaine de service (eau, électricité, télécom ...)"/>
            <x-text-input id="QuantiteConsommee" name="QuantiteConsommee" type="decimal" class="mt-1 block w-full" autocomplete="QuantiteConsommee" placeholder="Quantité consommée"/>
            <x-text-input id="Unite" name="Unite" type="text" class="mt-1 block w-full" autocomplete="Unite" placeholder="Unité"/>
            <x-text-input id="idUser" name="idUser" type="hidden" class="mt-1 block w-full" autocomplete="idUser"/> <!--WARNING: Branchement authentification - id User -->
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
            {{ __('Opérations Bancaire') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Veuillez charger un fichier .csv") }}
            {{ __("au format Date,Opération,Débit,Crédit") }}
        </p>
    </header>
    <form method='POST' action="{{ route('Domaine.store') }}">
        @csrf
        <div>
            <x-text-input id="NomFichierCSV" name="NomFichierCSV" type="text" class="mt-1 block w-full" autocomplete="NomFichierCSV" placeholder="Nom du fichier"/>
            <x-text-input id="CheminFichier" name="CheminFichier" type="hidden" class="mt-1 block w-full" autocomplete="CheminFichier"/>
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