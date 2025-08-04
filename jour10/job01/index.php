<?php
// Connexion à la base de données
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "jour09";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Requête SQL pour récupérer les données
$sql = "SELECT * FROM etudiants";
$result = $conn->query($sql);

// Vérifier s’il y a des résultats
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<thead><tr>";

    // Afficher les noms des colonnes (entêtes)
    while ($fieldinfo = $result->fetch_field()) {
        echo "<th>" . htmlspecialchars($fieldinfo->name) . "</th>";
    }

    echo "</tr></thead><tbody>";

    // Afficher les données ligne par ligne
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "Aucun résultat trouvé.";
}

// Fermer la connexion
$conn->close();
?>
