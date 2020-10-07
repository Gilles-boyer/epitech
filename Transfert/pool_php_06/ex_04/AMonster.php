<?php

include_once "IUnit.php";

abstract class AMonster implements IUnit
{
    protected  $_name = ""; //le nom de l'unité
    protected  $_hp = 0; //points de vie
    protected  $_ap = 0; // Points d'action
    protected  $_damage = 0 ; //damage infligé
    protected  $_apcost = 0; //point vie deduit
    protected  $_melee = false; //tous les monstres sont de type melee
    protected  $_check = "";

    //construct creer l objet avec le nom
    function __construct($name)  
    {
        $this->_name = $name;
    }

    //return le nom du monstre  
    function getName()
    {
        return $this->_name;
    }

    //return les point de vie
    function getHp()
    {
        return $this->_hp;
    }

    //return les points attack
    function getAp()
    {
        return $this->_ap;
    }
    
    //return info domage
    function getDamage()
    {
        return $this->_damage;
    }

    //echo "message de guerre"
    function equip($par = null)
    {
        echo "Monsters are proud and fight with their own bodies.\n";
    }

    //$par = un objet qui depend de l'interface IUnit
    function attack($par = null)
    {
        try
        {
            if(!(gettype($par) == "object"))
            {
                throw new Exception("Error in AMonster. Parameter is not an IUnit.\n");
                return false;
            }
            elseif(!is_a($par,"IUnit"))
            {
                throw new Exception("Error in AMonster. Parameter is not an IUnit.\n");
                return false;
            }
            else
            {
                if($this->_melee == false)
                {
                    echo "$this->_name: I'm too far away from ".$par->getName().".\n";
                    return false;
                }
                else
                {
                    if($this->_ap >= $this->_apcost)
                    {
                        $this->_ap -= $this->_apcost;
                        echo "$this->_name attacks ".$par->getName().".\n";
                        $par->receiveDamage($this->_damage);
                    }
                    else
                    {
                        return false;
                    }
                }

            }
        }
        catch(Exception $e)
        {   
           echo $e->getMessage(); 
        }

    }

    //recois les dégats recus et sa réduit la vie 
    function receiveDamage(int $par)
    {
        $this->_hp -= $par;   
        if($this->_hp <= 0)
        {   
            $this->_hp = 0;
            $this->_ap = 0;
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
                $this->_melee = true;//return true si le monstre est a proximité
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
        $this->_ap += 7;
        if($this->_ap > 50)
        {
            $this->_ap = 50;
        }
        
    }
    

}