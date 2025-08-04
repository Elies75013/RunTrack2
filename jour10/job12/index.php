<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'jour09';
$username = 'root';     // Adaptez si besoin
$password = '';         // Adaptez si besoin

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL : étudiants nés entre 1998 et 2018
    $query = "
        SELECT prenom, nom, naissance 
        FROM etudiants 
        WHERE naissance BETWEEN '1998-01-01' AND '2018-12-31';
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
    <title>Étudiants nés entre 1998 et 2018</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
            width: 60%;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 8px;
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
