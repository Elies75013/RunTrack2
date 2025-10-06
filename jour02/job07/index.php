<?php
function gras($str) {
    $mots = explode(" ", $str);
    foreach ($mots as &$mot) {
        if (ctype_upper(substr($mot, 0, 1))) {
            $mot = "<b>$mot</b>";
        }
    }
    return implode(" ", $mots);
}

function cesar($str, $decalage = 2) {
    $res = "";
    for ($i = 0; $i < strlen($str); $i++) {
        $c = $str[$i];
        if (ctype_alpha($c)) {
            $base = ctype_upper($c) ? 'A' : 'a';
            $res .= chr((ord($c) - ord($base) + $decalage) % 26 + ord($base));
        } else {
            $res .= $c;
        }
    }
    return $res;
}

function plateforme($str) {
    $mots = explode(" ", $str);
    foreach ($mots as &$mot) {
        if (substr($mot, -2) == "me") {
            $mot .= "_";
        }
    }
    return implode(" ", $mots);
}

$resultat = "";

if (isset($_POST["str"]) && isset($_POST["fonction"])) {
    $str = $_POST["str"];
    $fonction = $_POST["fonction"];

    if ($fonction == "gras") {
        $resultat = gras($str);
    } elseif ($fonction == "cesar") {
        $resultat = cesar($str);
    } elseif ($fonction == "plateforme") {
        $resultat = plateforme($str);
    }
}
?>


<form method="POST">
    <input type="text" name="str" placeholder="Entrez du texte" required>
    <select name="fonction">
        <option value="gras">Gras</option>
        <option value="cesar">César</option>
        <option value="plateforme">Plateforme</option>
    </select>
    <button type="submit">Valider</button>
</form>


<?php
if (!empty($resultat)) {
    echo "<p><strong>Résultat :</strong> $resultat</p>";
}
?>
