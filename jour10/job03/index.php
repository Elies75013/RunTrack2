<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";       // Modifier selon votre config
$password = "";           // Modifier selon votre config
$dbname = "jour09";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Requête SQL pour récupérer les étudiantes
$sql = "SELECT prenom, nom, naissance FROM etudiants WHERE sexe = 'Femme'";
$result = $conn->query($sql);

// Affichage du tableau HTML
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<thead><tr>";

    // Entêtes du tableau
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
    echo "Aucune étudiante trouvée.";
}

// Fermer la connexion
$conn->close();
?>
