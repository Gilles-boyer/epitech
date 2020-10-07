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
    function getType()
    {
        return ($this->_nameShark)->getType();
    }

}