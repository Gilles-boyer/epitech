<?php

include_once("Shark.php");

class GreatWhite extends Shark
{
    function eat($animal = null)
    {
    if(empty($animal) || is_string($animal))
    {
        echo ($this->_nameShark)->getName().": It's not worth my time.\n";
    }
    elseif(get_class($animal))
    {
        if(get_class($animal)=="Canary")
        {
            echo ($this->_nameShark)->getName().": Next time you try to give me that to eat, I'll eat you instead.\n";
        }
        elseif(($animal->getName())==($this->_nameShark)->getName())
        {
            echo ($this->_nameShark)->getName().": It's not worth my time.\n";
        }
        elseif(get_class($animal) == "GreatWhite")
        {
            Animal::$countFish -=1;
            Animal::$countAnimal -=1;
            $this->_frenzy = false;

            echo ($this->_nameShark)->getName().": It's not worth my time.\n";

            echo ($this->_nameShark)->getName().": The best meal one could wish for.\n";
            unset($animal);
        }
        elseif(get_class($animal) == "BlueShark")
        {
            Animal::$countFish -=1;
            Animal::$countAnimal -=1;
            $this->_frenzy = false;

            echo ($this->_nameShark)->getName().": It's not worth my time.\n";
            echo ($this->_nameShark)->getName()." ate a ".$animal->getType()." named ".$animal->getName().".\n";

            echo ($this->_nameShark)->getName().": The best meal one could wish for.\n";
            unset($animal);
        }
        elseif(get_class($animal) == "Shark")
        {
            Animal::$countFish -=1;
            Animal::$countAnimal -=1;
            $this->_frenzy = false;

            echo ($this->_nameShark)->getName().": It's not worth my time.\n";

            echo ($this->_nameShark)->getName().": The best meal one could wish for.\n";
            unset($animal);
        }
        else
        {
            echo ($this->_nameShark)->getName()." ate a ".$animal->getType()." named ".$animal->getName().".\n";
            Animal::$countAnimal -=1;
            if($animal->getType() == "mammal")
            {
                Animal::$countMammal -=1;
            }
            elseif($animal->getType() == "fish")
            {
                Animal::$countFish -=1;
            }
            elseif($animal->getType() == "bird")
            {
                Animal::$countBird -=1;
            }
            $this->_frenzy = false;
            unset($animal);
        }
    }
    }
    
}