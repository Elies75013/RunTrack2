<?php
$str = "Certaines choses changent, et d'autres ne changeront jamais.";
$len = strlen($str);
$newStr = "";

for ($i = 1; $i < $len; $i++) {
    $newStr .= $str[$i];
}
$newStr .= $str[0];

echo $newStr;
?>
