<?php
function nextLevel($level){
    $exponent = 1.1;
    $baseXP = 100;
    return floor($baseXP * pow($level , $exponent));
}
