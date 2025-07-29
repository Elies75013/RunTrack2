<?php
$style = isset($_POST['style']) ? $_POST['style'] : 'style1';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Formulaire avec styles</title>
  <link rel="stylesheet" href="<?= htmlspecialchars($style) ?>.css">
</head>
<body>
  <form method="POST" action="">
    <label for="style">Choisissez un style :</label>
    <select name="style" id="style">
      <option value="style1" <?= $style == 'style1' ? 'selected' : '' ?>>Style 1</option>
      <option value="style2" <?= $style == 'style2' ? 'selected' : '' ?>>Style 2</option>
      <option value="style3" <?= $style == 'style3' ? 'selected' : '' ?>>Style 3</option>
    </select>
    <button type="submit">Appliquer</button>
  </form>
</body>
</html>
