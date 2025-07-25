<?php
$hauteur = 5;

for ($i = 1; $i <= $hauteur; $i++) {
    
    echo str_repeat(" ", $hauteur - $i);

    if ($i == 1) {
        
        echo "^";
    } elseif ($i < $hauteur) {
       
        echo "/";
        echo str_repeat(" ", 2 * $i - 3);
        echo "\\";
    } else {
       
        echo "/";
        echo str_repeat("_", 2 * $i - 3);
        echo "\\";
    }

    echo "\n";
}
?>
