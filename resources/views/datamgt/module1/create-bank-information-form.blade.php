<div class="text-bg-success p-3 m-2 rounded">
    <h3>Création</h3>    
</div>
<div class="text-bg-success p-3 m-2 rounded">
    <h3>Compte Bancaire</h3>
    <form method='POST' action="{{ route('CompteBancaire.store') }}">
        @csrf
        <Label>Ajouter un compte bancaire </Label>
        <div>
            <input class="form-control" name="RefCompte" type="text" placeholder="Numero du compte">
            <input class="form-control" name="NomBanque" type="text" placeholder="Nom de la banque">
            <input class="form-control" name="Adresse" type="text" placeholder="Adresse">
            <input class="form-control" name="idUser" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User -->
            <input id="CptbanC" type="submit" value="Créer" class="btn btn-dark">
        </div>
        @error('compteBancaire')
                <p class="help is-danger">{{ $message }}</p>
        @enderror
    </form>
    
    <h3>Domaine</h3>
    <form method='POST' action="{{ route('Domaine.store') }}">
        @csrf
        <Label>Ajouter un domaine de service </Label>
        <div>
            <input class="form-control" name="Annee" type="text" placeholder="Année">    
            <input class="form-control" name="NomDomaine" type="text" placeholder="Domaine de service (eau, électricité, télécom ...)">
            <input class="form-control" name="QuantiteConsommee" type="text" placeholder="Quantité consommée">
            <input class="form-control" name="Unite" type="text" placeholder="Unité">
            <input class="form-control" name="idUser" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User -->
            <input id="DomaineC" type="submit" value="Créer" class="btn btn-dark">
        </div>
    </form>
    
    <h3>Opérations Bancaire</h3>
    <form method='POST' action="Api/operationBancaire">
        <Label>Charger un fichier .csv de vos opérations bancaire</Label>
        <div>
            <input class="form-control" name="NomFichierCSV" type="text" placeholder="Nom du fichier en .csv">
            <input class="form-control" name="CheminFichier" type="hidden" id="xxx" value="xxx">
            <!-- Rajouter fonctionnalité de chargement d'un fichier -->
            <input id="DomaineC" type="submit" value="Créer" class="btn btn-dark">
        </div>
    </form>

</div>