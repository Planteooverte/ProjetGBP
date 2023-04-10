<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>GBP Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" >
  </head>
  <body>
      <nav class="navbar navbar-expand-md bg-dark sticky-top navbar-dark">
        <a class="navbar-brand p-2" href="#">Menu Principal</a>
          <ul class="navbar-nav">
            <li class="nav-item active">
              <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Consultation</button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Relevé Bancaire</a></li>
                      <li><a class="dropdown-item" href="#">Relevé Imposition</a></li>
                    </ul>
              </div>
            </li>
            <li class="nav-item active ">
              <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Gestion des données</button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('CompteBancaireCreation') }}">Ajouter</a></li>
                      <li><a class="dropdown-item" href="#">Modifier</a></li>
                      <li><a class="dropdown-item" href="#">Supprimer</a></li>
                    </ul>
              </div>
            </li>
            <li class="nav-item active">
              <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Graphique</button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Opération Bancaire par service</a></li>
                      <li><a class="dropdown-item" href="#">Revue des Consommations Annuel</a></li>
                    </ul>
              </div>
            </li>
            
      </ul>
    </nav>
 
    @yield('contenu')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>