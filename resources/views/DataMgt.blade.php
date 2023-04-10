@extends('layouts.Menu')

@section('contenu')
    <div class="container-fluid">
        <div class="col-3 p-3 mx-auto">
            <h1>Gestion des données</h1>
        </div>
        <div class="col-4 text-bg-success p-3 m-2 rounded">
            <h3>Création</h3>    
        </div>
        <div class="col-4 text-bg-success p-3 m-2 rounded">
            <h3>Compte Bancaire</h3>
                <form method='POST' action="Api/compteBancaire">
                    <Label>Ajouter un compte bancaire </Label>
                    <div>
                        <input class="form-control" name="NumCompte" type="text" placeholder="Numero du compte">
                        <input class="form-control" name="NomBanque" type="text" placeholder="Nom de la banque">
                        <input class="form-control" name="Adress" type="text" placeholder="Adresse">
                        <input id="CptbanC" type="submit" value="Créer" class="btn btn-dark">
                    </div>
                </form>
            <h3>Domaine</h3>
                <form method='POST' action="Api/domaine">
                    <Label>Ajouter un domaine de service </Label>
                    <div>
                        <input class="form-control" name="Annee" type="text" placeholder="Année">    
                        <input class="form-control" name="NomDomaine" type="text" placeholder="Domaine de service (eau, électricité, télécom ...)">
                        <input class="form-control" name="QtDomaine" type="text" placeholder="Quantité consommée">
                        <input class="form-control" name="Unite" type="text" placeholder="Unité">
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
        <div class="col-4 text-bg-success p-3 m-2 rounded">
            <h3>Référence d'imposition</h3>
                <form method='POST' action="Api/profilImposition">
                    <Label>Ajouter un numero fiscal</Label>
                    <div>
                        <input class="form-control" name="NumFiscal" type="text" placeholder="Numéro fiscal">
                        <input id="CentImpC" type="submit" value="Créer" class="btn btn-dark">
                    </div>
                </form>
            <h3>Relevé d'imposition</h3>
                <form method='POST' action="Api/relImposition">
                    <Label>Ajouter un relevé d'imposition</Label>
                    <div>
                        <select class="rounded" name="TypeImp" id="TypeImp">
                            <option value="Revenue">Impôt sur le revenue</option>
                            <option value="Foncier">Impôt foncier</option>
                            <option value="Habitation">Taxe d'habitation</option>
                        <input class="form-control" name="AnneeFiscal" type="text" placeholder="Annee fiscal">
                        <input class="form-control" name="Montant" type="text" placeholder="Montant">
                        <input class="form-control" name="TauxImp" type="text" placeholder="Taux d'imposition">
                        <input class="form-control" name="RevFiscal" type="text" placeholder="Revenue fiscal de référence">
                        <input class="form-control" name="NbrPart" type="text" placeholder="Nombre de part">    
                        <input id="RelImpC" type="submit" value="Créer" class="btn btn-dark">
                    </div>
                </form>
        </div>
        <div class="col-4 text-bg-success p-3 m-2 rounded">
            <h3>Entreprise</h3>
                <form method='POST' action="Api/entreprise">
                    <Label>Ajouter un employeur</Label>
                    <div>
                        <input class="form-control" name="NomEnt" type="text" placeholder="Nom de l'entreprise">
                        <input class="form-control" name="Adresse" type="text" placeholder="Adresse">
                        <input class="form-control" name="DateEnt" type="text" placeholder="Date d'entrée">
                        <input class="form-control" name="DateSor" type="text" placeholder="Date de sortie">
                        <input id="CentImpC" type="submit" value="Créer" class="btn btn-dark">
                    </div>
                </form>
            <h3>Fiche de paye</h3>
            <form method='POST' action="Api/ficheDePaye">
                <Label>Ajouter les données d'une fiche de paye</Label>
                <div>
                    <input class="form-control" name="Periode" type="text" placeholder="Période">
                    <input class="form-control" name="SalBrut" type="text" placeholder="Salaire brut">
                    <input class="form-control" name="SalNet" type="text" placeholder="Salaire net">
                    <input class="form-control" name="ChargeEmp" type="text" placeholder="Charge employeur">
                    <input id="CentImpC" type="submit" value="Créer" class="btn btn-dark">
                </div>
            </form>
        </div>
        <div class="col-4 text-bg-success p-3 m-2 rounded">
            <h3>Inflation</h3>
                <form method='POST' action="Api/inflation">
                    <Label>Ajouter un taux d'inflation</Label>
                    <div>
                        <input class="form-control" name="TauxMoy" type="text" placeholder="Taux moyen">
                        <input class="form-control" name="Année" type="text" placeholder="Année">
                        <input id="CentImpC" type="submit" value="Créer" class="btn btn-dark">
                    </div>
                </form>
        </div>
    </div>

@endsection('contenu')