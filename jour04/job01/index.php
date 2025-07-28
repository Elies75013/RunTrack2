<!DOCTYPE html>
<html>
<head>
    <title>Formulaire GET</title>
</head>
<body>


<form method="GET" action="">
    Nom : <input type="text" name="nom">
    Prénom : <input type="text" name="prenom">
    Âge : <input type="text" name="age">
    <input type="submit" value="Envoyer">
</form>

<?php
if (!empty($_GET)) {
    $nombre_arguments = count($_GET);
    echo "Le nombre d'arguments GET envoyé est : $nombre_arguments";
}
?>

</body>
</html>
