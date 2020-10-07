<?php

class Character
{
    private $_name;
    private $_strength = 0;
    private $_magic = 0;
    private $_intelligence = 0;
    private $_life = 100;

    static $i = 0;

    function __construct(string $name=null)
    {
        if(is_null($name))
        {
            self::$i += 1;
            
            $this->_name = "Character ".self::$i;
            
        }
        else
        {
            $this->_name = $name;
            
        }
    }
    function __toString()
    {
        return "My name is $this->_name.\n";
    }
    function getName()
    {
        return $this->_name;
    }
    function getStrength()
    {
        return $this->_strength;
    }
    function getMagic()
    {
        return $this->_magic;
    }
    function getIntelligence()
    {
        return $this->_intelligence;
    }
    function getLife()
    {
        return $this->_life;
    }  
}




