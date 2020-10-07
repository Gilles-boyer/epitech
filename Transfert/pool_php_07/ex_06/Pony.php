<?php

class Pony
{
    public $gender;
    public $name;
    public $color;

    function __construct($gender,$name,$color)
    {
        $this->gender = $gender;
        $this->name = $name;
        $this->color = $color;
    }
    function __toString()
    {
      return "Don't worry, I'm a pony!\n";  
    }
    function __destruct()
    {
        echo "I'm a dead pony.\n";
    }
}
