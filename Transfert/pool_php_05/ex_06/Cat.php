<?php

include_once("Animal.php");

class Cat extends Animal
{
    private $_color; // renvoie une couleur string
    private $_namecat; // renvoie le nom du chat

    function __construct($namecat, $color="grey") //@par: nom du chat, couleur du chat
    {
        $this->_color = $color;
        $this->_namecat = New Animal($namecat,4,Animal::MAMMAL);
        echo $namecat.": MEEEOOWWWW\n";
    }
    function meow()
    {
        echo ($this->_namecat)->getName()." the $this->_color kitty is meowing.\n";
    }
    function getColor()
    {
        return $this->_color;
    }
    function setColor($para)
    {
        $this->_color = $para; 
    }
    function getName()
    {
        return ($this->_namecat)->getName();
    }
    function getLegs()
    {
        return ($this->_namecat)->getLegs();
    }
    function getType()
    {
        return ($this->_namecat)->getType();
    }
}