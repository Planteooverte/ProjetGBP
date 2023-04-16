@extends('layouts.Menu')

@section('contenu')
    <div class="container border">
        <div class="col p-3 mx-auto" style="width: 33%;">
            <h1>Gestion des données</h1>
        </div>
    </div>
    <div class="container border">
        <div class="row justify-content-center">
            <!-- ------------------------------------SECTION CREATE------------------------------------- -->
            <div class="col p-3 m-2 rounded">
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
                                    @foreach ($Domaines as $Domaine)
                                        <option value="{{  $Domaine->id }}">{{ $Domaine->NomDomaine }}</option>
                                    @endforeach     
                                </select>
                                <br>
                                <input class="form-control" name="idCentimpot" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User qui renvoie idCentimpot -->    
                                <input id="RelImpC" type="submit" value="Créer" class="btn btn-dark">
                            </div>
                        </form>
                </div>
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
                                <input class="form-control" name="idDomaine" type="hidden"  value="{{  $Domaine->id }}">
                                <input class="form-control" name="idEnt" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User -->
                                <input id="CentImpC" type="submit" value="Créer" class="btn btn-dark">
                            </div>
                        </form>
                </div>
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
            </div>
            <!-- ------------------------------------SECTION UPDATE------------------------------------- -->
            <div class="col p-3 m-2 rounded">
                <div class="text-bg-warning p-3 m-2 rounded">
                    <h3>Mise à jour</h3>    
                </div>
                <div class="text-bg-warning p-3 m-2 rounded">
                    <h3>Compte Bancaire</h3>
                        <form method='POST' action="{{ route('CompteBancaire.store') }}">
                            @csrf
                            <select class="rounded" name="idDomaine" size=1 style="width:100%">
                                    <option value="description">--Veuillez choisir un compte à modifier--</option>
                                @foreach ($CompteBancaires as $CompteBancaire)
                                    <option value="{{  $CompteBancaire->id }}">{{ $CompteBancaire->RefCompte }}</option>
                                @endforeach     
                            </select>
                            <div>
                                <input class="form-control" name="RefCompte" type="text" placeholder="{{ $CompteBancaire->RefCompte }}">
                                <input class="form-control" name="NomBanque" type="text" placeholder="{{ $CompteBancaire->NomBanque }}">
                                <input class="form-control" name="Adresse" type="text" placeholder="{{ $CompteBancaire->Adresse }}">
                                <input class="form-control" name="idUser" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User -->
                                <input id="CptbanC" type="submit" value="Modifier" class="btn btn-dark">
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
                                <input id="DomaineC" type="submit" value="Modifier" class="btn btn-dark">
                            </div>
                        </form>
                    <h3>Opérations Bancaire</h3>
                        <form method='POST' action="Api/operationBancaire">
                            <Label>Charger un fichier .csv de vos opérations bancaire</Label>
                            <div>
                                <input class="form-control" name="NomFichierCSV" type="text" placeholder="Nom du fichier en .csv">
                                <input class="form-control" name="CheminFichier" type="hidden" id="xxx" value="xxx">
                                <!-- Rajouter fonctionnalité de chargement d'un fichier -->
                                <input id="DomaineC" type="submit" value="Modifier" class="btn btn-dark">
                            </div>
                        </form>
                </div>
                <div class="text-bg-warning p-3 m-2 rounded">
                    <h3>Référence d'imposition</h3>
                        <form method='POST' action="{{ route('ProfilImposition.store') }}">
                            @csrf
                            <Label>Ajouter un numero fiscal</Label>
                            <div>
                                <input class="form-control" name="NumeroFiscal" type="text" placeholder="Numéro fiscal">
                                <input class="form-control" name="idUser" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User -->
                                <input id="CentImpC" type="submit" value="Modifier" class="btn btn-dark">
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
                                    @foreach ($Domaines as $Domaine)
                                        <option value="{{  $Domaine->id }}">{{ $Domaine->NomDomaine }}</option>
                                    @endforeach     
                                </select>
                                <br>
                                <input class="form-control" name="idCentimpot" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User qui renvoie idCentimpot -->    
                                <input id="RelImpC" type="submit" value="Modifier" class="btn btn-dark">
                            </div>
                        </form>
                </div>
                <div class="text-bg-warning p-3 m-2 rounded">
                    <h3>Entreprise</h3>
                        <form method='POST' action="{{ route('Entreprise.store') }}">
                            @csrf
                            <Label>Ajouter un employeur</Label>
                            <div>
                                <input class="form-control" name="NomEntreprise" type="text" placeholder="Nom de l'entreprise">
                                <input class="form-control" name="Adresse" type="text" placeholder="Adresse">
                                <input class="form-control" name="created_at" type="text" placeholder="Date d'entrée">
                                <input class="form-control" name="idUser" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User -->
                                <input id="CentImpC" type="submit" value="Modifier" class="btn btn-dark">
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
                                <input class="form-control" name="idDomaine" type="hidden"  value="{{  $Domaine->id }}">
                                <input class="form-control" name="idEnt" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User -->
                                <input id="CentImpC" type="submit" value="Modifier" class="btn btn-dark">
                            </div>
                        </form>
                </div>
                <div class="text-bg-warning p-3 m-2 rounded">
                    <h3>Inflation</h3>
                        <form method='POST' action="{{ route('Inflation.store') }}">
                            @csrf
                            <Label>Ajouter un taux d'inflation</Label>
                            <div>
                                <input class="form-control" name="TauxMoyen" type="text" placeholder="Taux moyen">
                                <input class="form-control" name="Annee" type="text" placeholder="Année">
                                <input class="form-control" name="idUser" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User -->
                                <input id="CentImpC" type="submit" value="Modifier" class="btn btn-dark">
                            </div>
                        </form>
                </div>
            </div>
            <!-- ------------------------------------SECTION DELETE------------------------------------- -->
            <div class="col p-3 m-2 rounded">
                <div class="text-bg-danger p-3 m-2 rounded">
                    <h3>Suppression</h3>    
                </div>
                <div class="text-bg-danger p-3 m-2 rounded">
                    <h3>Compte Bancaire</h3>
                        <form method='POST' action="{{ route('CompteBancaire.store') }}">
                            @csrf
                            <Label>Ajouter un compte bancaire </Label>
                            <div>
                                <input class="form-control" name="RefCompte" type="text" placeholder="Numero du compte">
                                <input class="form-control" name="NomBanque" type="text" placeholder="Nom de la banque">
                                <input class="form-control" name="Adresse" type="text" placeholder="Adresse">
                                <input class="form-control" name="idUser" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User -->
                                <input id="CptbanC" type="submit" value="Supprimer" class="btn btn-dark">
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
                                <input id="DomaineC" type="submit" value="Supprimer" class="btn btn-dark">
                            </div>
                        </form>
                    <h3>Opérations Bancaire</h3>
                        <form method='POST' action="Api/operationBancaire">
                            <Label>Charger un fichier .csv de vos opérations bancaire</Label>
                            <div>
                                <input class="form-control" name="NomFichierCSV" type="text" placeholder="Nom du fichier en .csv">
                                <input class="form-control" name="CheminFichier" type="hidden" id="xxx" value="xxx">
                                <!-- Rajouter fonctionnalité de chargement d'un fichier -->
                                <input id="DomaineC" type="submit" value="Supprimer" class="btn btn-dark">
                            </div>
                        </form>
                </div>
                <div class="text-bg-danger p-3 m-2 rounded">
                    <h3>Référence d'imposition</h3>
                        <form method='POST' action="{{ route('ProfilImposition.store') }}">
                            @csrf
                            <Label>Ajouter un numero fiscal</Label>
                            <div>
                                <input class="form-control" name="NumeroFiscal" type="text" placeholder="Numéro fiscal">
                                <input class="form-control" name="idUser" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User -->
                                <input id="CentImpC" type="submit" value="Supprimer" class="btn btn-dark">
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
                                    @foreach ($Domaines as $Domaine)
                                        <option value="{{  $Domaine->id }}">{{ $Domaine->NomDomaine }}</option>
                                    @endforeach     
                                </select>
                                <br>
                                <input class="form-control" name="idCentimpot" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User qui renvoie idCentimpot -->    
                                <input id="RelImpC" type="submit" value="Supprimer" class="btn btn-dark">
                            </div>
                        </form>
                </div>
                <div class="text-bg-danger p-3 m-2 rounded">
                    <h3>Entreprise</h3>
                        <form method='POST' action="{{ route('Entreprise.store') }}">
                            @csrf
                            <Label>Ajouter un employeur</Label>
                            <div>
                                <input class="form-control" name="NomEntreprise" type="text" placeholder="Nom de l'entreprise">
                                <input class="form-control" name="Adresse" type="text" placeholder="Adresse">
                                <input class="form-control" name="created_at" type="text" placeholder="Date d'entrée">
                                <input class="form-control" name="idUser" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User -->
                                <input id="CentImpC" type="submit" value="Supprimer" class="btn btn-dark">
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
                                <input class="form-control" name="idDomaine" type="hidden"  value="{{  $Domaine->id }}">
                                <input class="form-control" name="idEnt" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User -->
                                <input id="CentImpC" type="submit" value="Supprimer" class="btn btn-dark">
                            </div>
                        </form>
                </div>
                <div class="text-bg-danger p-3 m-2 rounded">
                    <h3>Inflation</h3>
                        <form method='POST' action="{{ route('Inflation.store') }}">
                            @csrf
                            <Label>Ajouter un taux d'inflation</Label>
                            <div>
                                <input class="form-control" name="TauxMoyen" type="text" placeholder="Taux moyen">
                                <input class="form-control" name="Annee" type="text" placeholder="Année">
                                <input class="form-control" name="idUser" type="hidden"  value="1"> <!--WARNING: Branchement authentification - id User -->
                                <input id="CentImpC" type="submit" value="Supprimer" class="btn btn-dark">
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

@endsection('contenu')