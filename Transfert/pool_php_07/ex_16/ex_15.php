<?php

namespace Imperium;

class Soldier
{
    private $_hp;
    private $_attack;
    private $_name;

    function __construct($name)
    {
        $this->_name = $name;
        $this->_attack = 12;
        $this->_hp = 50;
        
    }

    function getHp()
    {
        return $this->_hp;
    }

    function getAttack()
    {
        return $this->_attack;
    }
    
    function getName()
    {
        return $this->_name;
    }

    function setHp($hp)
    {
        $this->_hp = $hp;
    }

    function setAttack($attack)
    {
        $this->_attack = $attack;
    }

    function setName($name)
    {
        $this->_name = $name;
    }
    function doDamage($object)
    {
        $reduce = $object->getHp() - $this->_attack;
        $object->setHP($reduce);
    }
    function __toString()
    {
        return "$this->_name the Imperium Space Marine : $this->_hp HP.";
    }
}


namespace Chaos;

class Soldier
{
    private $_hp;
    private $_attack;
    private $_name;

    function __construct($name)
    {
        $this->_name = $name;
        $this->_attack = 12;
        $this->_hp = 70;
        
    }

    function getHp()
    {
        return $this->_hp;
    }

    function getAttack()
    {
        return $this->_attack;
    }
    
    function getName()
    {
        return $this->_name;
    }

    function setHp($hp)
    {
        $this->_hp = $hp;
    }

    function setAttack($attack)
    {
        $this->_attack = $attack;
    }

    function setName($name)
    {
        $this->_name = $name;
    }
    function doDamage($object)
    {
        $reduce = $object->getHp() - $this->_attack;
        $object->setHP($reduce);
    }
    function __toString()
    {
        return "$this->_name the Chaos Space Marine : $this->_hp HP.";
    }
}
