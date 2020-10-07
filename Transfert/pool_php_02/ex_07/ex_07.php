<?php

function my_division_modulo(int $fistNumber, $operChar, int $secondNumber)
{   
    if(!is_numeric($fistNumber) || !is_numeric($secondNumber))
    {
        throw new Exception("The given arguments aren't good.\n"); 
    }
    elseif($operChar === "/")
    {
        if($fistNumber == 0 || $secondNumber == 0)
        {
        throw new Exception("The given arguments aren't good.\n"); 
        }
        else
        {
        $result = $fistNumber / $secondNumber;

        return $result;
        }
    }
    else
    {
        throw new Exception("The given arguments aren't good.\n");
    }
}


