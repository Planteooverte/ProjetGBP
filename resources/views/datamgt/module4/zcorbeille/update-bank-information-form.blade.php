<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Compte Bancaire') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Modifier un compte") }}
        </p>
    </header>
     <form method='POST' action="{{ route('CompteBancaire.update') }} "> 
        @csrf
        <div>
            <select class="mt-1 block w-full" name="listeCompte" id="" required>
                <option value="">Sélection</option>
                @foreach ($CompteBancaires as $CompteBancaire)
                    <option value="{{  $CompteBancaire->id }}">{{ $CompteBancaire->RefCompte }}</option>
                @endforeach
            </select>
            <x-text-input id="id" name="id" type="hidden" class="mt-1 block w-full" value="{{  $CompteBancaire->id }}"/>
            <x-text-input id="NomBanque" name="NomBanque" type="text" class="mt-1 block w-full" placeholder="{{  $CompteBancaire->NomBanque }}"/>
            <x-text-input id="Adresse" name="Adresse" type="text" class="mt-1 block w-full" placeholder="{{  $CompteBancaire->Adresse }}"/>
            <x-text-input id="user_id" name="user_id" type="hidden" class="mt-1 block w-full" value="{{ Auth::user()->id }}"/>
        </div>
        @error('CompteBancaire')
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
            <x-text-input id="Annee" name="Annee" type="date" class="mt-1 block w-full" autocomplete="Annee" placeholder="Année" readonly/>
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