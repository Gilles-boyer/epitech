<?php

abstract class Apothecary
{  
    static function heal($object)
    {
        if(get_class($object) == "Imperium" || is_subclass_of($object,"Imperium"))
        {
            echo "No servant of the Emperor shall fall if I can help it.\n";
        }
        else
        {
            echo "The enemies of the Emperor shall be destroyed!\n";
        }

    } 
    
}
