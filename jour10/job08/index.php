<?php
// Paramètres de connexion
$host = 'localhost';
$dbname = 'jour09';
$user = 'root';
$password = ''; // À modifier si nécessaire

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour calculer la capacité totale des salles
    $sql = "SELECT SUM(capacite) AS capacite_totale FROM salles";
    $stmt = $pdo->query($sql);

    // Récupération du résultat
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Affichage du résultat dans un tableau HTML
    echo "<table border='1'>";
    echo "<tr>";
    foreach ($result as $key => $value) {
        echo "<th>$key</th>";
    }
    echo "</tr><tr>";
    foreach ($result as $value) {
        echo "<td>$value</td>";
    }
    echo "</tr></table>";

} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
