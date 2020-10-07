<?php

include_once("Animal.php");

class Shark extends Animal
{
    private $_frenzy = false;
    private $_nameShark;

    function __construct($name)
    {
        $this->_nameShark = New Animal($name,0,Animal::FISH);
        echo "A KILLER IS BORN!\n";
    }
    function smellBlood($bool)
    {
        $this->_frenzy = $bool;
    }
    function status()
    {
        if($this->_frenzy == true)
        {
            echo ($this->_nameShark)->getName()." is smelling blood and wants to kill.\n";
        }
        else
        {
            echo ($this->_nameShark)->getName()." is swimming peacefully.\n";
        }
    }
    function getName()
    {
        return ($this->_nameShark)->getName();
    }
    function getLegs()
    {
        return ($this->_nameShark)->getLegs();
    }
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
            elseif(($animal->getType())==  "mammal" || "bird" || "fish")
            {   
            $type = $animal->getType();
            echo ($this->_nameShark)->getName()." ate a ".$animal->getType()." named ".$animal->getName().".\n";
            unset($animal);
            $this->_frenzy = false;

            Animal::$countAnimal -= 1;
            if($type == "bird")
            {
                Animal::$countBird -=1;
            }
            elseif($type == "mammal")
            {
                Animal::$countMammal -=1;
            }
            elseif($type == "fish")
            {
                Animal::$countFish -=1;
            }
            }
            else
            {
            echo ($this->_nameShark)->getName().": It's not worth my time.\n";
            }
        }
        
    }
    function getType()
    {
        return ($this->_nameShark)->getType();
    }

}