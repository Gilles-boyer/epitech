<?php

abstract class AWeapon
{
    private $_name = ""; //string name = nom de l'arme
    private $_apcost = 0; //int puissance de tir
    private $_melee = false; //bool indiqu true si arme corp
    private $_damage = 0 ; //int domage infligé

    //@par: name, apcost, damage 
    function __construct($name =null ,$apcost=null ,$damage=null)
    {
        try
        {
            if(is_string($name) && is_integer($apcost) && is_integer($damage))
            {
                $this->_name = $name;
                $this->_apcost = $apcost;
                $this->_damage = $damage;
            }
            else
            {
                throw new Exception ("Error in AWeapon constructor. Bad parameters.\n");
                return false;
            }

        }
        catch(Exception $e)
        {
            echo "Test Exception : ".$e->getMessage();
        }
        
    }


    //getName return Name de l'arme
    function getName()
    {
        return $this->_name;
    }

    //getApcost return la puissance de l'arme
    function getApcost()
    {
        return $this->_apcost;
    }

    //getMelee return true si l'arme est une arme  au corp
    function isMelee()
    {
        return $this->_melee;
    }

    //getDomage return le domage créé par l'arme
    function getDamage()
    {
        return $this->_damage;
    }
    
    abstract function attack();
}


