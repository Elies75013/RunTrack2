<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'jour09';
$username = 'root';     // Modifiez selon votre configuration
$password = '';         // Modifiez selon votre configuration

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour récupérer nom des salles et nom des étages
    $query = "
        SELECT salles.nom AS nom_salle, etage.nom AS nom_etages
        FROM salles
        INNER JOIN etage ON salles.id_etages = etage.id;
    ";
    $stmt = $pdo->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Salles et Étages</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
            width: 50%;
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
            // En-têtes du tableau
            if (!empty($result)) {
                foreach (array_keys($result[0]) as $column) {
                    echo "<th>$column</th>";
                }
                echo "</tr>";
                // Données
                foreach ($result as $row) {
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
            } else {
                echo "<th>Aucune donnée trouvée</th></tr>";
            }
            ?>
    </table>
</body>
</html>
