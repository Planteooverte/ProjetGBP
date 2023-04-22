<div class="text-bg-success p-3 m-2 rounded">
    
<h3>Inflation</h3>
    <form method='POST' action="{{ route('Inflation.store') }}">
        @csrf
        <Label>Ajouter un taux d'inflation</Label>
        <div>
            <input class="form-control" name="TauxMoyen" type="text" placeholder="Taux moyen">
            <input class="form-control" name="Annee" type="text" placeholder="Année">
            <input class="form-control" name="idUser" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User -->
            <input id="CentImpC" type="submit" value="Créer" class="btn btn-dark">
        </div>
    </form>
    
</div>