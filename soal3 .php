<?php

function hitung($a, $b) {
    $sign = (($a < 0) ^
             ($b < 0)) ? -1 : 1;
    $a = abs($a);
    $b = abs($b);
     
    $quotient = 0;
    while ($a >= $b)
    {
        $a -= $b;
        ++$quotient;
    }
    if($sign==-1) $quotient=-$quotient;
    return $quotient;
}
 
echo hitung(7, 2);
?>