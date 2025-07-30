<?php
session_start();

// Fonction pour réinitialiser la partie
function resetGame() {
    $_SESSION['board'] = array_fill(0, 9, '-');
    $_SESSION['turn'] = 'X';
    $_SESSION['winner'] = null;
}

// Initialisation au premier chargement
if (!isset($_SESSION['board']) || isset($_POST['reset'])) {
    resetGame();
}

// Si une case est cliquée et que la partie n'est pas terminée
if (isset($_POST['cell']) && $_SESSION['winner'] === null) {
    $pos = (int)$_POST['cell'];

    // Si la case est libre
    if ($_SESSION['board'][$pos] === '-') {
        $_SESSION['board'][$pos] = $_SESSION['turn'];

        // Vérifier victoire
        $b = $_SESSION['board'];
        $winConditions = [
            [0,1,2], [3,4,5], [6,7,8], // lignes
            [0,3,6], [1,4,7], [2,5,8], // colonnes
            [0,4,8], [2,4,6]           // diagonales
        ];

        foreach ($winConditions as $line) {
            if ($b[$line[0]] !== '-' &&
                $b[$line[0]] === $b[$line[1]] &&
                $b[$line[1]] === $b[$line[2]]) {
                $_SESSION['winner'] = $b[$line[0]];
                break;
            }
        }

        // Si pas de gagnant, vérifier match nul
        if ($_SESSION['winner'] === null && !in_array('-', $b)) {
            $_SESSION['winner'] = 'N'; // N = Match nul
        }

        // Changer de joueur si pas fini
        if ($_SESSION['winner'] === null) {
            $_SESSION['turn'] = ($_SESSION['turn'] === 'X') ? 'O' : 'X';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Jeu du Morpion</title>
    <style>
        table {border-collapse: collapse;}
        td {border: 1px solid #000; width: 60px; height: 60px; text-align: center; font-size: 2em;}
        button {width: 100%; height: 100%; font-size: 1.5em;}
    </style>
</head>
<body>

<h1>Jeu du Morpion</h1>

<?php if ($_SESSION['winner'] !== null): ?>
    <?php if ($_SESSION['winner'] === 'N'): ?>
        <p>Match nul !</p>
    <?php else: ?>
        <p>Le joueur <?= $_SESSION['winner'] ?> a gagné !</p>
    <?php endif; ?>
    <?php resetGame(); ?>
<?php endif; ?>

<form method="post">
    <table>
        <tbody>
            <?php
            for ($i = 0; $i < 9; $i++) {
                if ($i % 3 === 0) echo "<tr>";

                echo "<td>";
                if ($_SESSION['board'][$i] === '-') {
                    echo '<button type="submit" name="cell" value="'.$i.'">-</button>';
                } else {
                    echo $_SESSION['board'][$i];
                }
                echo "</td>";

                if ($i % 3 === 2) echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <button type="submit" name="reset">Réinitialiser la partie</button>
</form>

<p>Joueur actuel : <?= $_SESSION['turn'] ?></p>

</body>
</html>
