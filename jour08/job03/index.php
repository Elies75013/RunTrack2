<?php
session_start();

// Réinitialiser la liste si reset cliqué
if (isset($_POST['reset'])) {
    $_SESSION['prenoms'] = [];
}

// Ajouter prénom si soumis et non vide
if (!empty($_POST['prenom'])) {
    $_SESSION['prenoms'][] = htmlspecialchars($_POST['prenom']);
}

// Initialiser la liste si elle n'existe pas
if (!isset($_SESSION['prenoms'])) {
    $_SESSION['prenoms'] = [];
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Prénoms</title></head>
<body>

<form method="post">
    <input type="text" name="prenom" placeholder="Prénom">
    <button type="submit">Envoyer</button>
    <button type="submit" name="reset">Reset</button>
</form>

<h3>Liste des prénoms :</h3>
<ul>
<?php
foreach ($_SESSION['prenoms'] as $p) {
    echo "<li>$p</li>";
}
?>
</ul>

</body>
</html>
