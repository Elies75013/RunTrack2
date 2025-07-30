<?php
// Gestion de la déconnexion
if (isset($_POST['deco'])) {
    // Supprime le cookie en le faisant expirer dans le passé
    setcookie('prenom', '', time() - 3600);
    $prenom = null;
}
// Gestion de la connexion
elseif (isset($_POST['connexion']) && !empty($_POST['prenom'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
    setcookie('prenom', $prenom, time() + 365*24*3600); // Cookie 1 an
} 
// Si cookie déjà présent, on récupère le prénom
elseif (isset($_COOKIE['prenom'])) {
    $prenom = $_COOKIE['prenom'];
} else {
    $prenom = null;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>

<?php if ($prenom === null): ?>
    <form method="post">
        <input type="text" name="prenom" placeholder="Entrez votre prénom" required>
        <button type="submit" name="connexion">Connexion</button>
    </form>
<?php else: ?>
    <p>Bonjour <?= htmlspecialchars($prenom) ?> !</p>
    <form method="post">
        <button type="submit" name="deco">Déconnexion</button>
    </form>
<?php endif; ?>

</body>
</html>
