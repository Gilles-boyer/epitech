<?php

include_once "IMovable.php";

class Character implements IMovable
{
    protected $_name;
    protected $_life = 50;
    protected $_agility = 2;
    protected $_strength = 2;
    protected $_wit = 2;

    const CLASSE = "Character";

    public function __construct($name)
    {
       $this->_name = $name; 
    }
    
    public function getName()
    {
        return $this->_name;
    }

    public function getLife()
    {
        return $this->_life;
    }

    public function getAgility()
    {
        return $this->_agility;
    }

    public function getStrength()
    {
        return $this->_strength;
    }

    public function getWit()
    {
        return $this->_wit;
    }

    public function getClasse()
    {
        return self::CLASSE;
    }
    public function moveRight()
    {
        echo $this->_name.": moves right.\n";
    }
    public function moveLeft()
    {
        echo $this->_name.": moves left.\n";
    }

    public function moveUp()
    {
        echo $this->_name.": moves up.\n";
    }

    public function moveDown()
    {
        echo $this->_name.": moves down.\n";
    }
    final function unsheathe()
    {
        echo $this->_name.": unsheathes his weapon.\n";
    }
    
    
}

