<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Maison </title>
    <style>
        body { font-family: monospace; white-space: pre; }
        form { margin-bottom: 20px; }
    </style>
</head>
<body>

<form method="POST">
    Largeur : <input type="text" name="largeur" required>
    Hauteur : <input type="text" name="hauteur" required>
    <button type="submit">Afficher la maison</button>
</form>
<?php
// Vérifie si le formulaire est envoyé (méthode POST)
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //  On récupère les valeurs du formulaire
    $largeur = (int)$_POST["largeur"]; // Convertit la valeur en entier
    $hauteur = (int)$_POST["hauteur"];

    //  On vérifie que les valeurs sont valides
    if ($largeur <= 0 || $hauteur <= 0 || $largeur % 2 !== 0) {
        echo " La largeur doit être un nombre PAIR positif, et la hauteur un entier positif.";
        exit;
    }

    //  Calcul de la moitié de la largeur (utilisé pour centrer le toit)
    $demi = $largeur / 2;

    // ---------------------------------------
    //  CONSTRUCTION DE LA MAISON
    // ---------------------------------------

    // 1. Le sommet du toit avec le symbole "^"
    // str_repeat(" ", $demi) : génère $demi espaces pour centrer le "^"
    echo str_repeat(" ", $demi) . "^" . "\n";

    // 2. Le reste du toit (triangle fait de /---\ )
    for ($i = 0; $i < $demi; $i++) {
        $spaces = str_repeat(" ", $demi - $i - 1); // espace avant le "/"
        $traits = str_repeat("-", $i * 2 + 1);     // tirets au milieu, augmente à chaque ligne
        echo $spaces . "/" . $traits . "\\" . "\n";
    }

    // 3. La ligne qui sépare le toit et le corps de la maison
    echo "/" . str_repeat("-", $largeur) . "\\" . "\n";

    // 4. Le corps de la maison (murs verticaux)
    for ($i = 0; $i < $hauteur; $i++) {
        echo "|" . str_repeat(" ", $largeur) . "|\n";
    }

    // 5. Le sol (ligne tout en bas)
    echo str_repeat("-", $largeur + 2) . "\n";
}
?>

</body>
</html>

