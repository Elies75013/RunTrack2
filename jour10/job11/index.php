<?php
// Informations de connexion à la base de données
$host = 'localhost';
$dbname = 'jour09';
$username = 'root';       // Changez selon votre configuration
$password = '';           // Changez selon votre configuration

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour récupérer la capacité moyenne des salles
    $query = "SELECT AVG(capacite) AS capacite_moyenne FROM salles;";
    $stmt = $pdo->query($query);

    // Récupération des résultats
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Capacité moyenne des salles</title>
    <style>
        table {
            border-collapse: collapse;
            width: 40%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <?php
            // Afficher les noms des champs
            foreach ($result[0] as $column => $value) {
                echo "<th>$column</th>";
            }
            ?>
        </tr>
        <?php
        // Afficher les valeurs
        foreach ($result as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . round($value, 2) . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
