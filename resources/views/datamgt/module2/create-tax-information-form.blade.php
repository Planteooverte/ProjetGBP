<div class="text-bg-success p-3 m-2 rounded">

    <h3>Référence d'imposition</h3>
    <form method='POST' action="{{ route('ProfilImposition.store') }}">
        @csrf
        <Label>Ajouter un numero fiscal</Label>
        <div>
            <input class="form-control" name="NumeroFiscal" type="text" placeholder="Numéro fiscal">
            <input class="form-control" name="idUser" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User -->
            <input id="CentImpC" type="submit" value="Créer" class="btn btn-dark">
        </div>
    </form>

    <h3>Relevé d'imposition</h3>
    <form method='POST' action="{{ route('RelImposition.store') }}">
        @csrf
        <Label>Ajouter un relevé d'imposition<br></Label>
        <div>
            <select class="rounded" name="TypeImposition" size=1 style="width:100%">
                <option value="description">--Veuillez choisir un impôt--</option>
                <option value="Revenue">Impôt sur le revenue</option>
                <option value="Foncier">Impôt foncier</option>
                <option value="Habitation">Taxe d'habitation</option>
            </select>
            <input class="form-control" name="AnneeFiscal" type="text" placeholder="Annee fiscal">
            <input class="form-control" name="Montant" type="text" placeholder="Montant">
            <input class="form-control" name="DateEtablissement" type="text" placeholder="Date d'établissement">
            <input class="form-control" name="TauxImposition" type="text" placeholder="Taux d'imposition">
            <input class="form-control" name="RevenuFiscalDeReference" type="text" placeholder="Revenue fiscal de référence">
            <input class="form-control" name="NbrDePart" type="text" placeholder="Nombre de part">
            <select class="rounded" name="idDomaine" size=1 style="width:100%">
                <option value="description">--Veuillez choisir un domaine de service--</option>
                <option value="Eau">Eau</option>
                <option value="Electricite">Electricité</option>
                <option value="Telecom">Telecommunication(Internet, Telephone, Vod)</option>
                <option value="Eau">Telecommunication</option>
                <option value="Eau">Autres domaines...</option>      
            </select>
            <br>
            <input class="form-control" name="idCentimpot" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User qui renvoie idCentimpot -->    
            <input id="RelImpC" type="submit" value="Créer" class="btn btn-dark">
        </div>
    </form>
    
</div>