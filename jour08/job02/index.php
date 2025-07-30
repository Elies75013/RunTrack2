<?php
if (isset($_POST['reset'])) {
    setcookie("nbvisites", 0, time() + 3600);
    $nbvisites = 0;
} else {
    if (isset($_COOKIE['nbvisites'])) {
        $nbvisites = $_COOKIE['nbvisites'] + 1;
    } else {
        $nbvisites = 1;
    }
    setcookie("nbvisites", $nbvisites, time() + 3600);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cookie compteur</title>
</head>
<body>
    <h1>Nombre de visites : <?= $nbvisites ?></h1>

    <form method="post">
        <button type="submit" name="reset">Reset</button>
    </form>
</body>
</html>
