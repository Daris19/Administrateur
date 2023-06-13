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
<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "adminpanel");
?>
<body>
    <?php
 // Vérifier si l'élève est connecté
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    // Récupérer les notes de l'élève à partir de la table "notes"
    $pdo = new PDO('mysql:host=localhost;dbname=Adminpanel;charset=utf8', 'root', '');
    $requete = $pdo->prepare('SELECT matiere, note FROM notes WHERE id = :id');
    $requete->bindParam(':id', $id);
    $requete->execute();
    $notes = $requete->fetchAll();

    // Afficher les notes de l'élève
    if (count($notes) > 0) {
        echo '<h1>Mes notes</h1>';
        echo '<table>';
        echo '<tr><th>Matière</th><th>Note</th></tr>';
        foreach ($notes as $note) {
            echo '<tr>';
            echo '<td>' . $note['matiere'] . '</td>';
            echo '<td>' . $note['note'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Aucune note disponible.';
    }
} else {
    echo 'Accès non autorisé.';
}

    ?>
    <title>Espace Élève</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
   
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h1 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f5f5f5;
}

    </style>

    
</body>
</html>

</body>
</html>
