<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";       // Modifier si besoin
$password = "";           // Modifier si besoin
$dbname = "jour09";

// Connexion à MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Requête SQL : étudiants ayant moins de 18 ans
$sql = "
    SELECT * 
    FROM etudiants 
    WHERE TIMESTAMPDIFF(YEAR, naissance, CURDATE()) < 18
";

$result = $conn->query($sql);

// Affichage du tableau HTML
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<thead><tr>";

    // En-têtes du tableau
    while ($fieldinfo = $result->fetch_field()) {
        echo "<th>" . htmlspecialchars($fieldinfo->name) . "</th>";
    }

    echo "</tr></thead><tbody>";

    // Données
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "Aucun étudiant de moins de 18 ans trouvé.";
}

// Fermeture de la connexion
$conn->close();
?>
