<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Maison</title>
    <style>
        body { font-family: monospace; white-space: pre; }
        form { margin-bottom: 20px; }
    </style>
</head>
<body>

<!-- Formulaire pour saisir largeur et hauteur -->
<form method="POST">
    Largeur : <input type="text" name="largeur" required>
    Hauteur : <input type="text" name="hauteur" required>
    <button type="submit">Afficher la maison</button>
</form>

<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Récupération des valeurs saisies par l'utilisateur et conversion en entier
    $largeur = (int)$_POST["largeur"];
    $hauteur = (int)$_POST["hauteur"];

    // Vérifie que les valeurs sont des entiers positifs
    if ($largeur <= 0 || $hauteur <= 0) {
        echo "La largeur et la hauteur doivent être des entiers positifs.";
        exit;
    }

    // Si la largeur est paire, on la transforme en impair supérieur (par ex : 6 devient 7)
    if ($largeur % 2 === 0) {
        $largeur += 1;
        // Message pour informer l'utilisateur de l'ajustement automatique
        echo "Largeur ajustée automatiquement à $largeur (prochain nombre impair).<br><br>";
    }

    // Calcul du centre (moitié de la largeur), utilisé pour centrer le toit
    $demi = floor($largeur / 2);

    // ------------------------------
    // CONSTRUCTION DE LA MAISON
    // ------------------------------

    // 1. Affiche le sommet du toit (symbole "^") centré
    echo str_repeat(" ", $demi) . "^" . "\n";

    // 2. Génère les lignes du toit avec des "/---\"
    for ($i = 0; $i < $demi; $i++) {
        $spaces = str_repeat(" ", $demi - $i - 1);           // espaces pour le décalage à gauche
        $traits = str_repeat("-", 2 * $i + 1);               // tirets qui augmentent à chaque ligne
        echo $spaces . "/" . $traits . "\\" . "\n";          // construit la ligne du toit
    }

    // 3. Ligne qui sépare le toit du corps de la maison
    echo "/" . str_repeat("-", $largeur) . "\\" . "\n";

    // 4. Affiche les murs du corps de la maison
    for ($i = 0; $i < $hauteur; $i++) {
        echo "|" . str_repeat(" ", $largeur) . "|\n";        // murs verticaux avec espace vide au centre
    }

    // 5. Affiche le sol de la maison (ligne pleine)
    echo str_repeat("-", $largeur + 2) . "\n";               // +2 pour les bords gauche et droit
}
?>

</body>
</html>
