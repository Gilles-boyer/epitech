<?php

class Gecko
{
    private $_name;
    private $_age;

    function __construct($name="",$age = 0)
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

}   