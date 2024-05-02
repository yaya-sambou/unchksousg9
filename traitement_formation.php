<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom_formation = $_POST['nom_formation'];
    $description_formation = $_POST['description_formation'];
    $matieres = $_POST['matieres']; // Les matières sont séparées par des virgules

    // Insérer la formation dans la base de données
    // Vous devrez remplacer ces informations avec vos propres détails de connexion à la base de données
    $localhost = "localhost";
    $root = "root";
    $password = "password";// Mot de passe de la base de données
    $unchk_bignona = "unchk_bignona";

    // Créer une connexion à la base de données
    $conn = new mysqli($localhost, $root, $password, $unchk_bignona);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Insérer la formation dans la table 'formations'
    $sql_insert_formation = "INSERT INTO formations (nom, description) VALUES ('$nom_formation', '$description_formation')";
    if ($conn->query($sql_insert_formation) === TRUE) {
        // Récupérer l'ID de la formation nouvellement insérée
        $formation_id = $conn->insert_id;

        // Séparer les matières saisies par l'utilisateur en un tableau
        $matieres_array = explode(',', $matieres);

        // Insérer les matières associées à la formation dans la table 'matieres'
        foreach ($matieres_array as $matiere) {
            $matiere = trim($matiere); // Supprimer les espaces autour de la matière
            $sql_insert_matiere = "INSERT INTO matieres (nom, formation_id) VALUES ('$matiere', '$formation_id')";
            $conn->query($sql_insert_matiere);
        }

        echo "La formation et les matières associées ont été ajoutées avec succès.";
    } else {
        echo "Erreur lors de l'ajout de la formation : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>
