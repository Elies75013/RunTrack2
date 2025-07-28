<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Maison conforme</title>
</head>
<body>

<form method="GET" action="">
  <label for="largeur">Largeur :</label>
  <input type="text" id="largeur" name="largeur" required>
  <br><br>
  <label for="hauteur">Hauteur :</label>
  <input type="text" id="hauteur" name="hauteur" required>
  <br><br>
  <button type="submit">Dessiner la maison</button>
</form>

<?php
if (isset($_GET['largeur']) && isset($_GET['hauteur'])) {
    $largeur = (int)$_GET['largeur'];
    $hauteur = (int)$_GET['hauteur'];

    if ($largeur >= 3 && $hauteur >= 2 && $largeur % 2 === 0) {
        echo "<pre>";

        $etagesToit = $largeur / 2;

        
        for ($i = 0; $i < $etagesToit; $i++) {
            $espacesAvant = str_repeat(" ", $etagesToit - $i - 1);
            $espacesMilieu = str_repeat(" ", 2 * $i);
            echo $espacesAvant . "/" . $espacesMilieu . "\\" . "\n";
        }

        
        for ($j = 0; $j < $hauteur - 1; $j++) {
            echo "|" . str_repeat(" ", $largeur - 2) . "|\n";
        }

       
        echo "|" . str_repeat("_", $largeur - 2) . "|\n";

        echo "</pre>";
    } else {
        echo "<p style='color:red;'>Largeur paire ≥ 4 et hauteur ≥ 2 requises.</p>";
    }
}
?>

</body>
</html>
