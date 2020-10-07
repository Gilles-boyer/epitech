<?php

class Character
{
    protected $_name = "";
    protected $_life = 50 ;
    protected $_agility = 2;
    protected $_strength = 2;
    protected $_wit = 2;

    const CLASSE= "Character";

    function __construct($name)
    {
        $this->_name = $name;
    }
    function getName()
    {
        return $this->_name;
    }
    function getLife()
    {
        return $this->_life;
    }
    function getAgility()
    {
        return $this->_agility;
    }
    function getStrength()
    {
        return $this->_strength;
    }
    function getWit()
    {
        return $this->_wit;
    }
    function getClasse()
    {
        return self::CLASSE;
    }

}   