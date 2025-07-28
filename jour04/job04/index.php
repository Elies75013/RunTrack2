<!DOCTYPE html>
<html>
<head>
    <title>Affichage des arguments POST</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        
    </style>
</head>
<body>


<form method="POST" action="">
    Prénom : <input type="text" name="prenom">
    Nom : <input type="text" name="nom">
    Ville : <input type="text" name="ville">
    <input type="submit" value="Envoyer">
</form>

<?php

if (!empty($_POST)) {
    echo "<h2>Arguments POST reçus :</h2>";
    echo "<table>";
    echo "<tr><th>Argument</th><th>Valeur</th></tr>";

    foreach ($_POST as $argument => $valeur) {
        echo "<tr><td>" . htmlspecialchars($argument) . "</td><td>" . htmlspecialchars($valeur) . "</td></tr>";
    }

    echo "</table>";
}
?>

</body>
</html>
