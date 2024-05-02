<?php
// Inclure le fichier de connexion à la base de données
include 'connexion_bdd.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    // Récupérer les autres données du formulaire
    // ...

    // Préparer la requête SQL d'insertion
    $sql = "INSERT INTO etudiants (nom) VALUES (:nom)";
    // Préparer et exécuter la requête avec PDO pour éviter les injections SQL
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    // Binder les autres paramètres si nécessaire
    // ...

    // Exécuter la requête
    if ($stmt->execute()) {
        // Rediriger l'utilisateur vers une page de confirmation
        header("Location: confirmation.php");
        exit();
    } else {
        // Gérer l'erreur d'insertion dans la base de données
        echo "Erreur lors de l'inscription de l'étudiant.";
    }
}
?>


