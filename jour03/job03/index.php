<?php
$str = "I'm sorry Dave I'm afraid I can't do that";
$voyelles = "aeiouyAEIOUY";
for ($i = 0; $i < strlen($str); $i++) {
    if (str_contains($voyelles, $str[$i])) {
        echo $str[$i];
    }
}
?>
