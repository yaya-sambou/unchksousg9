<?php
// Vous devez inclure votre fichier de connexion à la base de données ici
include 'connexion_bdd.php';

// Récupérer la matière soumise par le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matiere = $_POST['matiere'];

    // Ici, vous pouvez récupérer les notes de l'étudiant dans cette matière depuis la base de données et les afficher
}
?>
