<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === "John" && $password === "Rambo") {
        echo "<p>C'est pas ma guerre</p>";
    } else {
        echo "<p>Votre pire cauchemar</p>";
    }
} else {
?>

  <form method="POST" action="">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Se connecter</button>
  </form>

<?php
}
?>

</body>
</html>
