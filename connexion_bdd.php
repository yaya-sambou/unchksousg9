<?php
$localhost = "localhost";
$root = "root";
$password = "password"; // Mettez le mot de passe de votre base de données ici
$unchk_bignona = "unchk_bignona"; // Nom de votre base de données

try {
    $pdo = new PDO("mysql:host=$localhost;dbname=$unchk_bignona", $root, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit(); // Arrêtez l'exécution du script en cas d'échec de la connexion
}

// Si nous arrivons ici, la connexion à la base de données a réussi
// Vous pouvez maintenant continuer avec le reste de votre code
?>
