<?php
// Déclaration des variables
$bool = true;
$int = 42;
$string = "Bonjour";
$float = 3.14;

// Tableau des variables
$variables = [
    ["type" => "boolean", "nom" => "bool", "valeur" => $bool],
    ["type" => "entier", "nom" => "int", "valeur" => $int],
    ["type" => "string", "nom" => "string", "valeur" => $string],
    ["type" => "float", "nom" => "float", "valeur" => $float],
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau des variables</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<h2>Variables en PHP</h2>
<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>Nom</th>
            <th>Valeur</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($variables as $var): ?>
            <tr>
                <td><?= $var["type"] ?></td>
                <td><?= $var["nom"] ?></td>
                <td>
                    <?= is_bool($var["valeur"]) ? ($var["valeur"] ? "true" : "false") : $var["valeur"] ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
