<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=Adminpanel;charset=utf8', 'root', '');

// Vérifie si des notes ont été soumises
if (isset($_POST['note'])) {
    // Commencer la transaction
    $pdo->beginTransaction();

    try {
        // Préparer la requête d'insertion
        $stmt = $pdo->prepare("INSERT INTO notes (id, nom, prenom, note, matiere) VALUES (:id, :nom, :prenom, :note, :matiere)");

        // Parcourir le tableau des notes soumises
        foreach ($_POST['note'] as $id => $note) {
            // Rechercher l'élève correspondant à l'ID
            $requete = $pdo->prepare("SELECT nom, prenom FROM eleve WHERE id = :id");
            $requete->execute(array(':id' => $id));
            $eleve = $requete->fetch();

            // Vérifier si l'élève existe
            if ($eleve) {
                $nom = $eleve['nom'];
                $prenom = $eleve['prenom'];

                // Récupérer la matière correspondante
                $matiere = $_POST['matiere'][$id];

                // Exécuter la requête avec les valeurs correspondantes
                $stmt->execute(array(':id' => $id, ':nom' => $nom, ':prenom' => $prenom, ':note' => $note, ':matiere' => $matiere));
            } else {
                echo "Élève introuvable pour l'ID : $id<br>";
            }
        }

        // Valider la transaction
        $pdo->commit();

        // Afficher un message de succès après l'enregistrement des notes
        echo "Les notes ont été enregistrées avec succès.";
        header('Location: moyenn.php');
    } catch (Exception $e) {
        // En cas d'erreur, annuler la transaction
        $pdo->rollBack();
        echo "Une erreur s'est produite lors de l'enregistrement des notes : " . $e->getMessage();
    }
}

?>
