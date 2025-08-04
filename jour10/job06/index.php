<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'jour09';
$user = 'root';
$password = ''; // À adapter selon votre configuration

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour compter les étudiants
    $sql = "SELECT COUNT(*) AS nb_etudiants FROM etudiants";
    $stmt = $pdo->query($sql);

    // Récupération du résultat
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Affichage du tableau HTML
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
