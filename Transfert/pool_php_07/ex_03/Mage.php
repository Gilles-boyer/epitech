<?php

include_once "Character.php";

class Mage extends Character
{
    
    const CLASSE = "Mage";
        
    public function __construct($name)
    {
        parent::__construct($name);
        $this->_life = 70;
        $this->_agility = 10;
        $this->_strength = 3;
        $this->_wit = 10;
        echo $this->_name.": May the gods be with me.\n";
    }

    public function getClasse()
    {
        return self::CLASSE;
    }

    public function attack()
    {
        echo $this->_name.": Feel the power of my magic!\n";
    }

    public function __destruct()
    {
        echo $this->_name.": By the four gods, I passed away...\n";
    }
}

