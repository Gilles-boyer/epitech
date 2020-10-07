<?php

include_once("Shark.php");

class BlueShark extends Shark
{
    function eat($animal = null)
    {
        if(empty($animal) || is_string($animal))
        {
            echo ($this->_nameShark)->getName().": It's not worth my time.\n";
        }
        else
        {
            if(($this->_nameShark)->getName()==$animal->getName())
            {
                 echo ($this->_nameShark)->getName().": It's not worth my time.\n";
            }
            elseif(($animal->getType())==  "fish")
            {   
                $type = $animal->getType();
                echo ($this->_nameShark)->getName()." ate a ".$animal->getType()." named ".$animal->getName().".\n";
                unset($animal);
                $this->_frenzy = false;
                Animal::$countAnimal -= 1;
                Animal::$countFish -=1;
            }
            else
            {
            echo ($this->_nameShark)->getName().": It's not worth my time.\n";
            }
        }
        
    }
}