<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=adminpanel;charset=utf8', 'root', '');

// Vérifie si des présences ont été soumises
if (isset($_POST['presence'])) {
    // Parcourez le tableau des présences soumises
    foreach ($_POST['presence'] as $eleve => $present) {
        // Séparez le nom et le prénom de l'élève
        $eleve = explode('_', $eleve);
        $nom = $eleve[0];
        $prenom = $eleve[1];

        // Échappez les valeurs pour éviter les injections SQL
        $nom = $pdo->quote($nom);
        $prenom = $pdo->quote($prenom);

        // Vérifie si l'élève est présent ou non
        $presence = ($present == 'on') ? 1 : 0;

        // Récupérer la date actuelle
        $date = date('Y-m-d');

        // Requête pour mettre à jour la présence de l'élève dans la base de données avec la date
        $query = "UPDATE eleve SET presence = presence + $presence, date = '$date' WHERE nom = $nom AND prenom = $prenom";
        $pdo->exec($query);
        $errorInfo = $pdo->errorInfo();
        if ($errorInfo[0] !== PDO::ERR_NONE) {
            echo "Erreur lors de l'exécution de la requête : " . $errorInfo[2];
        }
    }
}


    // Affiche un message de succès après l'enregistrement des présences
    echo "Les présences ont été enregistrées avec succès.";

?>
