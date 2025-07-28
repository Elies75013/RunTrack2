<!DOCTYPE html>
<html>
<head>
    <title>Formulaire POST</title>
</head>
<body>


<form method="POST" action="">
    Nom : <input type="text" name="nom">
  Prénom : <input type="text" name="prenom">
   Âge : <input type="text" name="age">
    <input type="submit" value="Envoyer">
</form>

<?php

if (!empty($_POST)) {
    $nombre_arguments = count($_POST);
    echo "Le nombre d'arguments POST envoyé est : $nombre_arguments";
}
?>

</body>
</html>
