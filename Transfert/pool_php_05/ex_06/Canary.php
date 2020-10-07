<?php

include_once("Animal.php");

class Canary extends Animal
{
    private $_nameCanary;
    private $_eggs = 0;

    function __construct($name)
    {
        $this->_nameCanary = New Animal($name,2,Animal::BIRD);
        echo "Yellow and smart ? Here I am!\n";
    }

    function getEggsCount()
    {
        return $this->_eggs;
    }
    function layEgg()
    {
        $this->_eggs += 1;
    }
    function getName()
    {
        return ($this->_nameCanary)->getName();
    }
    function getLegs()
    {
        return ($this->_nameCanary)->getLegs();
    }
    function getType()
    {
        return ($this->_nameCanary)->getType();
    }
}