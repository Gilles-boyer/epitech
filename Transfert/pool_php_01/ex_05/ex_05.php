<?php


function my_swap(&$a, &$b) 
{
    $c = $b;
    $b = $a;
    $a = $c;
}
