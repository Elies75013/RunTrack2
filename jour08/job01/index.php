<?php
session_start(); // Démarre la session

// Réinitialisation si le bouton reset est cliqué
if (isset($_POST['reset'])) {
    $_SESSION['nbvisites'] = 0;
} else {
    // Si la variable n'existe pas, on l'initialise à 1
    if (!isset($_SESSION['nbvisites'])) {
        $_SESSION['nbvisites'] = 1;
    } else {
        $_SESSION['nbvisites']++; // Sinon, on l'incrémente
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Compteur de visites</title>
</head>
<body>
    <h1>Nombre de visites : <?= $_SESSION['nbvisites'] ?></h1>

    <form method="post">
        <button type="submit" name="reset">Reset</button>
    </form>
</body>
</html>
