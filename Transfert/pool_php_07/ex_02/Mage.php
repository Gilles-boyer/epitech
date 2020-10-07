<?php

include_once "Character.php";

class Mage extends Character
{
    const CLASSE = "Mage";

    function __construct($name)
    {
        $this->_name = $name;
        $this->_life = 70;
        $this->_agility = 10;
        $this->_strength = 3;
        $this->_wit = 10;
        echo $this->_name.": May the gods be with me.\n";
    }
    function getClasse()
    {
        return self::CLASSE;
    }
    function attack()
    {
        echo $this->getName().": Feel the power of my magic!\n";
    }
    function __destruct()
    {
        echo $this->_name.": By the four gods, I passed away...\n";
    }
}



