<?php

 

class Pony
{

 

    private $gender;
    private $name;
    private $color;

 

    function __construct($gender,$name,$color)
    {
        $this->gender = $gender;
        $this->name = $name;
        $this->color = $color;
        
    }

 

    function __destruct()
    {
        echo "I'm a dead pony.\n";
    }

 

// method magique détermine comment l'objet doit réagir lorsqu'il est traité comme une chaîne de caractères.
    function __toString()     
    {
        return "Don't worry, I'm a pony!\n";
    }

 

    function speak()
    {
        echo "Hiii hiii hiii\n";
    }

 

    function __call($methode,$argument)
    {
        echo "I don't know what to do...\n";
    }

 

        function __get($name)
    {
        if($name == "gender" || $name == "name" || $name == "color") 
        {
            echo "It's not right to get a private attribute!\n";
            return $this->$name;
        }
        else
        {
            return "There is no attribute: $name."."\n";
        }         
    }

 

    function __set($name, $value)
    {
        if($name == "gender" || $name == "name" || $name == "color") 
        {   
            echo "It's not right to set a private attribute!\n";
            $this->$name = $value;
        }
        else
        {
            echo "There is no attribute: $name."."\n";
        }
    }

 

    function getName()
    {
        return $this->name;
    }

 

    function getGender()
    {
        return $this->gender;
    }

 

    function getColor()
    {
        return $this->color;
    }
}
