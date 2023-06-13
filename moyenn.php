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
            <a class="navbar-brand" href="inter.php">Espace Professeur</a>
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
    <title>Ajouter des notes</title>
    <style>
        body {
            padding-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Moyenne des élèves</h1>
        <form method="post" action="add_notes.php">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Note</th>
                       <th> <label for ="matiere"> matiere </label>
                <select name="matiere" id="matiere">
                <option value="francais">francais</option>
                <option value="Mathématique">Mathématique</option>
                <option value="Culture General">Culture General</option>
                <option value="CEJM">CEJM</option>
                <option value="Anglais">Anglais</option>
                <option value="Cyber Sécurite">Cyber Sécurite</option>
              
                </select></th>
                    </tr>
                </thead>
                <tbody>
                <?php       
                // Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=Adminpanel;charset=utf8', 'root', '');

// Vérifie si des notes ont été soumises
if (isset($_POST['note'])) {
    // Commencer la transaction
    $pdo->beginTransaction();

    try {
        // Parcourir le tableau des notes soumises
        foreach ($_POST['note'] as $eleve => $note) {
            // Séparer le nom et le prénom de l'élève
            $eleve = explode('_', $eleve);
            $nom = $eleve[0];
            $prenom = $eleve[1];

            // Récupérer la matière
            $matiere = $_POST['matiere'][$eleve];

            // Échapper les valeurs pour éviter les injections SQL
            $note = $pdo->quote($note);
            $nom = $pdo->quote($nom);
            $prenom = $pdo->quote($prenom);
            $matiere = $pdo->quote($matiere);

            // Requête pour insérer la note dans la base de données avec la matière
            $query = "INSERT INTO notes (nom, prenom, note, matiere) VALUES ($nom, $prenom, $note, $matiere)";
            $pdo->exec($query);
        }

        // Valider la transaction
        $pdo->commit();

        // Afficher un message de succès après l'enregistrement des notes
        echo "Les notes ont été enregistrées avec succès.";
    } catch (Exception $e) {
        // En cas d'erreur, annuler la transaction
        $pdo->rollBack();
        echo "Une erreur s'est produite lors de l'enregistrement des notes : " . $e->getMessage();
    }
}

// Requête pour récupérer les noms, prénoms et ID des élèves
$requete = $pdo->query('SELECT id, nom, prenom FROM eleve');

// Boucle pour afficher les élèves et les champs de saisie de notes
while ($eleve = $requete->fetch()) {
    echo '<tr>';
    echo '<td>' . $eleve['nom'] . '</td>';
    echo '<td>' . $eleve['prenom'] . '</td>';
    echo '<td><input type="number" name="note[' . $eleve['id'] . ']" value="' . $eleve['nom'] . '_' . $eleve['prenom'] . '"></td>';
    echo '<td>';
    echo '<label for="matiere">Matière</label>';
    echo '<select name="matiere[' . $eleve['id'] . ']" id="matiere" required>';
    echo '<option value="francais">francais</option>';
    echo '<option value="Mathématique">Mathématique</option>';
    echo '<option value="Culture General">Culture General</option>';
    echo '<option value="CEJM">CEJM</option>';
    echo '<option value="Anglais">Anglais</option>';
    echo '<option value="Cyber Sécurite">Cyber Sécurite</option>';
    echo '</select>';
    echo '</td>';
    echo '</tr>';
    echo '</tr>';
}

                    ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</body>

</html>
