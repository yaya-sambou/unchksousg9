<?php
// Inclure le fichier de connexion à la base de données
include 'connexion_bdd.php';

// Récupérer les données du formulaire
$nom = $_POST['nom'];
// Récupérer les autres données du formulaire

// Requête SQL pour insérer l'étudiant dans la base de données
$sql = "INSERT INTO etudiants (nom) VALUES (:nom)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nom', $nom);
// Binder les autres paramètres et exécuter la requête
$stmt->execute();

// Redirection vers une page de confirmation ou autre
header("Location: confirmation_inscription.php");
exit();
?>
