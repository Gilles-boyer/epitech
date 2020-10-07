<?php


function my_concat($str1, $str2)
{
    $str3 = str_replace('"',' ',$str1);
    $str4 = str_replace('"',' ',$str2);
    
    
    echo "$str3 ";
    echo  $str4  ;

}







