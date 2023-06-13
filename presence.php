<!DOCTYPE html>
<html>
<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "adminpanel");
?>

<!DOCTYPE html>
<html>

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
            <a class="navbar-brand" href="#inter.php">Espace Professeur</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Cours <sup>+</sup></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="inter.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="efectif.php">liste des eleves</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="moyenn.php">Moyenne</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="presence.php">liste de Presence</a>
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

                    <a class="google-link" href="index.php" target="_blank">Se deconnecter</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Example Code -->

    <?php
    include('includes/header.php');
    include('includes/topbar.php');
    ?>
  <title>Liste de présence</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    input[type="checkbox"] {
      transform: scale(1.5);
    }

    button[type="submit"] {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <h1>Liste de présence</h1>
  
  <form method="post" action="enregistrer_presence.php">
    <table>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Présent</th>
      </tr>
      <?php
     // Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=adminpanel;charset=utf8', 'root', '');

// Requête pour récupérer les noms et prénoms des élèves
$requete = $pdo->query('SELECT nom, prenom FROM eleve');

while ($eleve = $requete->fetch()) {
    echo '<tr>';
    echo '<td>' . $eleve['nom'] . '</td>';
    echo '<td>' . $eleve['prenom'] . '</td>';
    echo '<td><input type="checkbox" name="presence[' . $eleve['nom'] . '_' . $eleve['prenom'] . ']"></td>';
    echo '<td>' . date('Y-m-d') . '</td>'; // Ajout de la date
    echo '</tr>';
}

?>

    </table>
    <button type="submit" class="btn btn-primary">Enregistrer les présences</button>
  </form>
  
</body>
</html>


