<?php


namespace planet\moon;
require "Mars.php";
use planet\Mars;
class Phobos 
{
    private $_Mars;
    

    function __construct($mars=[])
    {  

        if(is_object($mars))
        {
            echo"Phobos placed in orbit.\n";
            $this->_Mars = $mars;
        }
        else
        {
            echo"No planet given.\n";
        }


    }
    function getMars()
    {
        return $this->_Mars;
    }
}