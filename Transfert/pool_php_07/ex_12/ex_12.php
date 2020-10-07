<?php

class Dolly
{
    public $age;
    public $animal;
    public $doctor;

    function __construct($age, $animal, $doctor)
    {
        $this->age = $age;
        $this->animal = $animal;
        $this->doctor = $doctor;
    }
    function __clone()
    {
        $this->age = $this->age;
        $this->animal = $this->animal;
        $this->doctor = $this->doctor;
        echo "I will survive !\n";
        
    }
}
function clone_object($object)
{
    return clone $object;  
}

