<?php
$str = "On n’est pas le meilleur quand on le croit mais quand on le sait";
$dic = ["voyelles" => 0, "consonnes" => 0];
$str = strtolower($str);

foreach (str_split($str) as $char) {
    if (ctype_alpha($char)) {
        if (str_contains("aeiouy", $char)) {
            $dic["voyelles"]++;
        } else {
            $dic["consonnes"]++;
        }
    }
}
?>

<table border="1">
    <thead>
        <tr>
            <th>Voyelles</th>
            <th>Consonnes</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $dic["voyelles"] ?></td>
            <td><?= $dic["consonnes"] ?></td>
        </tr>
    </tbody>
</table>
