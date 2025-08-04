<?php
// Paramètres de connexion à la BDD
$host = 'localhost';
$dbname = 'jour09';
$user = 'root';
$password = ''; // À adapter selon votre configuration

try {
    // Connexion à la base de données via PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL : toutes les infos des salles triées par capacité décroissante
    $sql = "SELECT * FROM salles ORDER BY capacite DESC";
    $stmt = $pdo->query($sql);

    // Récupération de toutes les lignes
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Affichage du tableau HTML
    if (count($results) > 0) {
        echo "<table border='1'>";
        // En-tête
        echo "<tr>";
        foreach (array_keys($results[0]) as $column) {
            echo "<th>$column</th>";
        }
        echo "</tr>";
        // Données
        foreach ($results as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Aucune salle trouvée.";
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
