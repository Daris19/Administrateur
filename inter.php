	
	<!doctype html>
<html lang="en">
  <head>
  <link rel="stylesheet" type="text/css" href="interface.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example">

    <!-- Example Code -->
    
    <nav class="navbar navbar-dark bg-dark fixed-top">
      <div class="container-fluid">

        <a class="navbar-brand" href="inter.php">Espace Professeur</a>     

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Cours <sup>+</sup></h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="inter.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="efectif.php">liste des eleves</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  ELEVES
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li><a class="dropdown-item" href="efectif.php">Efectifes</a></li>
                  <li><a class="dropdown-item" href="moyenn.php">Moyenne</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="pesence.php">Liste de Presence</a></li>
                </ul>
              </li>
            </ul>
         
            <style>
        .google-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4285F4;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .google-link:hover {
            background-color: #3367D6;
        }
    </style>
</head>
<body>
    <a class="google-link" href="https://www.google.com" target="_blank">Recherche Google</a>
</body>
          </div>
        </div>
      </div>
    </nav>

    
    
    <!-- End Example Code -->
    <div class="poster-container">
  <h1>Bienvenue dans notre espace de gestion de cours !</h1>
  <div class="animation-container">
    <img src="coollogo_com-7701586.png" alt="Logo de l'espace de gestion de cours">
  </div>
      </div>
      <style>
        .poster-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 400px;
  background-color: #f1f1f1;
}

.animation-container {
  position: relative;
}

@keyframes spin {
  0% {
    transform: rotate(0);
  }
  50% {
    transform: rotate(360deg);
  }
}

.animation-container img {
  animation: spin 10s linear infinite;
}

      </style>
  </body>
</html>