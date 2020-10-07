<?php

include_once "Character.php";

class Warrior extends Character
{
    const CLASSE = "Warrior";

    function __construct($name)
    {
        $this->_name = $name;
        $this->_life = 100;
        $this->_agility = 10;
        $this->_strength = 8;
        $this->_wit = 3;
        echo $this->_name.": I'll engrave my name in history!\n";
    }
    function getClasse()
    {
        return self::CLASSE;
    }
    function attack()
    {
        echo $this->getName().": I'll crush you with my hammer!\n";
    }
    function __destruct()
    {
        echo $this->_name.": Aarrg I can't believe I'm dead...\n";
    }
}