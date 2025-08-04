<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";       // À adapter si besoin
$password = "";           // À adapter si besoin
$dbname = "jour09";

// Connexion à MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Requête SQL : étudiants dont le prénom commence par "T"
$sql = "SELECT * FROM etudiants WHERE prenom LIKE 'T%'";
$result = $conn->query($sql);

// Affichage des résultats dans un tableau HTML
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<thead><tr>";

    // Entêtes du tableau
    while ($fieldinfo = $result->fetch_field()) {
        echo "<th>" . htmlspecialchars($fieldinfo->name) . "</th>";
    }

    echo "</tr></thead><tbody>";

    // Lignes de données
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "Aucun étudiant dont le prénom commence par 'T' n’a été trouvé.";
}

// Fermeture de la connexion
$conn->close();
?>
