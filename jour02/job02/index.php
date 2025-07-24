<?php
$excluded = [26, 37, 88, 1111, 3233];

for ($i = 0; $i <= 1337; $i++) {
    if (in_array($i, $excluded)) {
        continue;
    }
    echo "$i<br />";
}
?>
