<?php
function calcule($a, $operation, $b) {
    return eval("return $a $operation $b;");
}

echo calcule(4, "+", 5); 
?>