<?php
// Paramètres de connexion
$host = 'localhost';
$dbname = 'jour09';
$user = 'root';
$password = ''; // À adapter selon votre configuration

try {
    // Connexion PDO à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL : sélection triée par capacité croissante
    $sql = "SELECT * FROM salles ORDER BY capacite ASC";
    $stmt = $pdo->query($sql);

    // Récupération des données
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Affichage dans un tableau HTML
    if (count($results) > 0) {
        echo "<table border='1'>";
        // En-tête du tableau
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
        echo "Aucune donnée trouvée dans la table 'salles'.";
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
