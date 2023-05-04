<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Référence d\'imposition') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Ajouter un numero fiscal") }}
        </p>
    </header>
    <form method='POST' action="{{ route('ProfilImposition.store') }}">
        @csrf
        <div>
            <x-text-input id="NumeroFiscal" name="NumeroFiscal" type="number" class="mt-1 block w-full" placeholder="Numéro fiscal"/>
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
            {{ __('Relevé d\'imposition') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Ajouter un relevé d'imposition") }}
        </p>
    </header>
    <form method='POST' action="{{ route('RelImposition.store') }}">
        @csrf
        <div>
            <select class="mt-1 block w-full" name="TypeImposition">
                <option value="description">--Veuillez choisir un impôt--</option>
                <option value="Revenue">Revenue</option>
                <option value="Foncier">Foncier</option>
                <option value="Habitation">Taxe d'habitation</option>
            </select>
            <x-text-input id="AnneeFiscal" name="AnneeFiscal" type="date" class="mt-1 block w-full" autocomplete="AnneeFiscal" placeholder="Année fiscal"/>
            <x-text-input id="Montant" name="Montant" type="decimal" class="mt-1 block w-full" autocomplete="Montant" placeholder="Montant"/>
            <x-text-input id="DateEtablissement" name="DateEtablissement" type="date" class="mt-1 block w-full" autocomplete="DateEtablissement" placeholder="Date d'établissement"/>
            <x-text-input id="TauxImposition" name="TauxImposition" type="decimal" class="mt-1 block w-full" autocomplete="TauxImposition" placeholder="Taux d'imposition"/>
            <x-text-input id="RevenuFiscalDeReference" name="RevenuFiscalDeReference" type="decimal" class="mt-1 block w-full" autocomplete="RevenuFiscalDeReference" placeholder="Revenue fiscal de référence"/>
            <x-text-input id="NbrDePart" name="NbrDePart" type="number" class="mt-1 block w-full" autocomplete="NbrDePart" placeholder="Nombre de part"/>
            <x-text-input id="domaine_id" name="domaine_id" type="hidden" class="mt-1 block w-full" value="Impôt"/>
            <x-text-input id="profil_imposition_id" name="profil_imposition_id" type="hidden" class="mt-1 block w-full" value="1"/>
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