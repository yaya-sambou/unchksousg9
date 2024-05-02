<?php
// Vous devez inclure votre fichier de connexion à la base de données ici
include 'connexion_bdd.php';

// Vérifier si l'ID de l'étudiant est passé en tant que paramètre dans l'URL
if (isset($_GET['etudiant_id'])) {
    // Récupérer l'ID de l'étudiant depuis l'URL
    $etudiant_id = $_GET['etudiant_id'];

    // Requête SQL pour récupérer les notes de l'étudiant avec son ID
    $sql = "SELECT matieres.nom AS matiere, notes.note FROM notes
            INNER JOIN matieres ON notes.matiere_id = matieres.id
            WHERE notes.etudiant_id = $etudiant_id";

    // Exécution de la requête
    $result = $pdo->query($sql);

    // Vérifier si des résultats ont été trouvés
    if ($result->rowCount() > 0) {
        // Affichage des notes de l'étudiant
        echo "<h1>Notes de l'étudiant</h1>";
        echo "<table border='1'>";
        echo "<tr><th>Matière</th><th>Note</th></tr>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>".$row['matiere']."</td><td>".$row['note']."</td></tr>";
        }
        echo "</table>";
    } else {
        // Aucune note trouvée pour cet étudiant
        echo "Aucune note trouvée pour cet étudiant.";
    }
} else {
    // L'ID de l'étudiant n'a pas été fourni
    echo "ID de l'étudiant non fourni.";
}
?>
