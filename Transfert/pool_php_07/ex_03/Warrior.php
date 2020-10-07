<?php

include_once "Character.php";

class Warrior extends Character
{
    const CLASSE = "Warrior";
       
    public function __construct($name)
    {
        parent::__construct($name);
        $this->_life = 100;
        $this->_agility = 10;
        $this->_strength = 8;
        $this->_wit = 3;
        echo $this->_name.": I'll engrave my name in history!\n";      
    }

    public function getClasse()
    {
        return self::CLASSE;
    }

    public function attack()
    {
        echo $this->_name.": I'll crush you with my hammer!\n";
    }

    public function __destruct()
    {
        echo $this->_name.": Aarrg I can't believe I'm dead...\n";
    }
}