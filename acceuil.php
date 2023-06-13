<!DOCTYPE html>
<html>

<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <h1>Espace Élève</h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="acceuil.php">Acceuil</a>
        </li>
        <br>
        <br>
        <li class="nav-item">
          <a class="nav-link" href="note.php">Note </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="abcences.php">Abcences </a>
        </li>
       
      </ul>
      <a class="google-link" href="index.php" target="_blank">Se deconnecter</a>
      <h2>Cours <sup>+</sup></h2>
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
    </div>
  </div>
</nav>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <title>Espace Professeur</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Bienvenue dans votre Espace </h1>
    <div class="container">
        <div class="circle"></div>
        <div class="rectangle"></div>
        <div class="triangle"></div>
    </div>


</body>
</html>

<style>
body {
    margin: 0;
    padding: 0;
    /* background-image: url("https://www.revolutionpermanente.fr/IMG/arton10251.jpg?1513027685"); */
}
h1 {
    text-align: center;
}
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.circle {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background-color: #FF5722;
    animation: rotate 5s infinite linear;
}

.rectangle {
    width: 200px;
    height: 100px;
    background-color: #4CAF50;
    opacity: 0;
    animation: fade 5s infinite alternate;
}

.triangle {
    width: 0;
    height: 0;
    border-left: 100px solid transparent;
    border-right: 100px solid transparent;
    border-bottom: 173px solid #2196F3;
    opacity: 0;
    animation: slide 5s infinite alternate;
}

@keyframes rotate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

@keyframes fade {
    0% {
        opacity: 0;
    }
    50% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}

@keyframes slide {
    0% {
        transform: translateY(0);
        opacity: 0;
    }
    50% {
        transform: translateY(100px);
        opacity: 1;
    }
    100% {
        transform: translateY(0);
        opacity: 0;
    }
}

</style>
<script>
</script>
</body>
</html>



















<style>

</style>
<script>
    
</script>