<?php
function leetSpeak($str) {
    $leet = [
        'A' => '4',
        'B' => '8',
        'E' => '3',
        'G' => '6',
        'L' => '1',
        'S' => '5',
        'T' => '7'
    ];

   
    $str = strtoupper($str);

    
    return strtr($str, $leet);
}


echo leetSpeak("Salut les amis !");
?>
