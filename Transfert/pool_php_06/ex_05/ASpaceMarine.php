<?php


include_once "IUnit.php";

abstract class ASpaceMarine implements Iunit
{
    protected  $_name = ""; //le nom de l'unité
    protected  $_hp = 0; //points de vie
    protected  $_ap = 0; // Points d'action.
    protected  $_weapon ;
    protected  $_oktofight = false;
    protected  $_melee = false;
    protected  $_apcost =0;
    protected  $_damage = 0;

    static $check = [];

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
    function getWeapon()
    {
        return $this->_weapon;
    }
    function equip($par=null) //par = weapon 
    {
        try
        {
            if(!(gettype($par) == "object"))
            {
                throw new Exception("Error in ASpaceMarine. Parameter is not an AWeapon.\n");
                return false;
            }
            elseif(!($par instanceof AWeapon))
            {
                throw new Exception("Error in ASpaceMarine. Parameter is not an AWeapon.\n");
                return false;
            }
            else
            {
                $this->_weapon = $par;
                $this->_melee = $par->isMelee();
                $this->_apcost = $par->getApcost();
                $this->_damage = $par->getDamage();
                self::$check += [$this->_name => $par->getName()];
                echo $this->_name." has been equipped with a ".$par->getName().".\n";
            }    
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        
    }
    function attack($par=null)
    {
        try
        {
            if(!(gettype($par) == "object"))
            {
                throw new Exception("Error in ASpaceMarine. Parameter is not an IUnit.\n");
                return false;
            }
            elseif(!(is_a($par,"IUnit")))
            {
                throw new Exception("Error in ASpaceMarine. Parameter is not an IUnit.\n");
                return false;
            }
            else
            {
                if($this->_melee && !$this->_oktofight)
                {
                    echo $this->_name.": I’m too far away from ".$par->getName().".\n";
                }
                else
                {
                    if($this->_ap >= $this->_apcost)
                    {
                        $this->_ap -= $this->_apcost;
                        echo $this->_name." attacks ".$par->getName()." with a ".$this->_weapon->getName().".\n";
                        $par->receiveDamage($this->_damage);  
                    }
                    else
                    {
                        return false;
                    }
                }

                if(!($this->getWeapon()))
                {
                    echo "$this->_name: Hey, this is crazy. I'm not going to fight this empty handed.\n";
                }

            }  
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
      
        
    }
    function receiveDamage(int $par)
    {
        $this->_hp -= $par;   
        if($this->_hp <= 0)
        {   
            $this->_hp = 0;
            $this->_ap = 0;
            $this->_oktofight = false;
            $this->_melee = false;
            return false;
           
        }
    }

    //defini la position de la cible 
    function moveCloseTo($par = null)//$par = objet
    {
        try
        {   if($this->_name == $par->getName())
            {
                return false;
            }
            elseif(!is_a($par,"IUnit"))
            {
                throw new Exception("Error in AMonster. Parameter is not an IUnit.\n");
                return false;
            }
            else
            {
                $this->_oktofight = true;//return true si le monstre est a proximité
                echo $this->_name." is moving closer to ".$par->getName().".\n";     
            }    
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }
    //en attente
    function recoverAP()
    {
        $this->_ap += 9;
        if($this->_ap > 50)
        {
            $this->_ap = 50;
        }
        
    }
    function getMelee()
    {
        return $this->_melee;
    }
    function getOktoFight()
    {
        return $this->_oktofight;
    }



}