<div class="text-bg-success p-3 m-2 rounded">

    <h3>Entreprise</h3>
    <form method='POST' action="{{ route('Entreprise.store') }}">
        @csrf
        <Label>Ajouter un employeur</Label>
        <div>
            <input class="form-control" name="NomEntreprise" type="text" placeholder="Nom de l'entreprise">
            <input class="form-control" name="Adresse" type="text" placeholder="Adresse">
            <input class="form-control" name="created_at" type="text" placeholder="Date d'entrée">
            <input class="form-control" name="idUser" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User -->
            <input id="CentImpC" type="submit" value="Créer" class="btn btn-dark">
        </div>
    </form>

    <h3>Fiche de paye</h3>
    <form method='POST' action="{{ route('FicheDePaye.store') }}">
        @csrf
        <Label>Ajouter les données d'une fiche de paye</Label>
        <div>
            <input class="form-control" name="Periode" type="text" placeholder="Période - format année/mois/jour">
            <input class="form-control" name="SalaireBrut" type="text" placeholder="Salaire brut">
            <input class="form-control" name="SalaireNet" type="text" placeholder="Salaire net">
            <input class="form-control" name="ChargeEmployeur" type="text" placeholder="Charge employeur">
            <input class="form-control" name="idDomaine" type="hidden"  value="1">
            <input class="form-control" name="idEnt" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User -->
            <input id="CentImpC" type="submit" value="Créer" class="btn btn-dark">
        </div>
    </form>
    
</div>