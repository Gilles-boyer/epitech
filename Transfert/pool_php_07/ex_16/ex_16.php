<?php




include_once "ex_15.php";


class Scanner
{
    function scan($object)
    {
        if(get_class($object) === "Imperium\Soldier")
        {
            echo "Praise be, Emperor, Lord.\n";
        }
        else
        {
            echo "Xenos spotted.\n";
        }
    }
}
