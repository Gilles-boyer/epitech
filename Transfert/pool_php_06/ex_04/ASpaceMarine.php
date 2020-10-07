<?php

include_once "IUnit.php";

abstract class ASpaceMarine implements Iunit
{
    protected  $_name = ""; //le nom de l'unité
    protected  $_hp = 0; //points de vie
    protected  $_ap = 0; // Points d'action.

    //construct creer l objet avec le nom
    function __construct($name)  
    {
        $this->_name = $name;
    }

    function getName()
    {
        return $this->_name;
    }

    function getHp()
    {
        return $this->_hp;
    }

    function getAp()
    {
        return $this->_ap;
    }
    function equip($par)
    {
        
    }
    function attack($par)
    {
        
    }
    function receiveDamage(int $par)
    {
        
    }
    function moveCloseTo($par)
    {
        
    }
    function recoverAP()
    {
        
    }



}