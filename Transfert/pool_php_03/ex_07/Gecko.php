<?php

class Gecko
{
    private $_name;
    private $_age;
    private $_energy = 100;

    function __construct($name=NULL,$age = 0)
    {
        $this->_name = $name;
        $this->_age = $age;

        if(empty($name))
        {
            echo "Hello !\n";
        }
        else
        {
            echo "Hello $this->_name !\n";
        }    
    }
    function getName()
    {
        return $this->_name;
    }
    function setName($name)
    {
        $this->_name = $name;
    }
    function __destruct()
    {
        if(empty($this->_name))
        {
            echo "Bye !\n";
        }
        else
        {
            echo "Bye $this->_name !\n";
        }
    }
    function getAge()
    {
        return $this->_age;
    }
    function setAge($add)
    {
        $this->_age = $add;  
    }
    function status()
    {
        switch($this->_age)
            {
            case 0:
                    echo "Unborn Gecko\n";
                 break;
            case ($this->_age == 1 || $this->_age == 2):
                    echo "Baby Gecko\n";
                 break;
            case (($this->_age)>=3 && ($this->_age) <= 10):
                    echo "Adult Gecko\n";
                 break;
            case (($this->_age)>=11 && ($this->_age) <= 13):
                    echo "Old Gecko\n";
                    break;
            default:
                    echo "Impossible Gecko\n";       
            } 
    }
    function hello($string)
    {
        if(is_int($string))
        {
            for($i = 0; $i < $string ; $i++)
            {
                if(is_null($this->_name))
                {
                    echo "Hello !\n";
                }
                else
                {
                    echo "Hello, I'm $this->_name!\n";
                }
            }
        }
        elseif(is_string($string))
        {
            if(is_null($this->_name))
            {
                echo "Hello $string!\n";
            }
            elseif(!is_null($this->_name))
            {
                echo "Hello $string, I'm $this->_name!\n";
            }
        }
    }
    function eat($eat)
    {
        switch(strtolower($eat))
        {
            case "meat":
                $this->_energy = $this->_energy+10;
                echo "Yummy!\n";
            break;

            case "vegetable":
                $this->_energy = $this->_energy-10;
                echo "Erk!\n";
            break;

            default:
                echo "I can't eat this.\n";
        }
    }
    function getEnergy()
    {   
        if($this->_energy > 100)
        {
            return $this->_energy = 100;
        }
        elseif($this->_energy < 0)
        {
            return $this->_energy = 0;
        }
        else
        {
            return $this->_energy;
        } 
    }
    function setEnergy($energy)
    {
        
        if($this->_energy > 100)
        {
            return $this->_energy = 100;
        }
        elseif($this->_energy < 0)
        {
            return $this->_energy = 0;
        }
        else
        {
            $this->_energy = $energy;
        }

    }
    function work()
    {
        switch($this->_energy)
        {
            case $this->_energy = 0 :

                $this->_energy = $this->_energy +50;
                echo "Heyyy... I'm too sleepy, better take a nap!\n";
                
            break;
            case $this->_energy < 25 :

                $this->_energy = $this->_energy +50;
                echo "Heyyy... I'm too sleepy, better take a nap!\n";
                
            break;
            case $this->_energy >= 25 :

                $this->_energy = $this->_energy -9;
                echo "I'm working T.T\n";
                
            break;
            
        }
    }

}   