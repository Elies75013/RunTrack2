<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Pair ou Impair</title>
</head>
<body>

<form method="GET" action="">
  <label for="nombre">Entrez un nombre :</label>
  <input type="text" id="nombre" name="nombre" required>
  <button type="submit">Vérifier</button>
</form>

<?php
if (isset($_GET['nombre'])) {
    $valeur = $_GET['nombre'];

    if (is_numeric($valeur)) {
        if ($valeur % 2 == 0) {
            echo "<p> Nombre pair </p>";
        } else {
            echo "<p> Nombre impair </p>";
        }
    } else {
        echo "<p>Veuillez entrer un nombre valide.</p>";
    }
}
?>

</body>
</html>
