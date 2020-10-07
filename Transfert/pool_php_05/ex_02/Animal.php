<?php

class Animal
{
    private $_name; //donne le nom de l'objet animal
    private $_legs; //donne le nombre patte de l'animal ne peut être inferieur a 4
    private $_type; //donne le type d'animal ex : oiseau

    const MAMMAL=0; //defini que 0 vaut "mammal"
    const FISH=1; //defini que 1 vaut "fish"
    const BIRD=2; //defini que 2 vaut "bird"
    

    private static $countAnimal = 0; // compte le nombre animal total
    private static $countMammal = 0; // compte le nombre de mammal
    private static $countFish   = 0; // compte le nombre de fish
    private static $countBird   = 0; //compte le nombre oiseau

    //prend en parametre obligatoire "un nom" "le nombre de jambes" "un type"
	function __construct($name, $legs, $type) {

        $this->_name = $name; //donne un nom
        $this->_legs = $legs; //le nombre de jambe
        $this->_type = $type; //le type d'animal
        self::$countAnimal += 1;
        
        if($type==self::MAMMAL)
        {
            self::$countMammal +=1;
        }
        elseif($type==self::FISH)
        {
            self::$countFish +=1;
        }
        elseif($type==self::BIRD)
        {
            self::$countBird +=1;
        }
        echo "My name is $this->_name and I am a ".$this->getType()."!\n";

    }
    function getName() { 
 		return $this->_name; 
    }
    function getLegs() { 
        return $this->_legs; 
    }
    function getType() {
       
        if($this->_type == self::MAMMAL)
        {
            return "mammal";//mammal 0
        }
        elseif($this->_type == self::FISH)
        {
            return "fish";//fish 1
        }
        elseif($this->_type == self::BIRD)
        {
            return "bird";//bird 2
        } 
    }
    function setName($para)
    {
        $this->_name = $para;
    }
    function set_Type($para)
    {
        $this->_type = $para;
    }
    static function getNumberOfAnimalsAlive()
    {
        if(self::$countAnimal==0)
        {
            echo "There is currently ".self::$countAnimal." animals alive in our world.\n";
        }
        elseif(self::$countAnimal==1)
        {
            echo "There is currently ".self::$countAnimal." animal alive in our world.\n";
        }
        else
        {
           echo "There are currently ".self::$countAnimal." animals alive in our world.\n"; 
        }
        return self::$countAnimal;
    }
    static function getNumberOfMammals()
    {
        if(self::$countMammal == 0)
        {
           echo "There is currently ".self::$countMammal." mammals alive in our world.\n"; 
        }
        elseif(self::$countMammal == 1)
        {
           echo "There is currently ".self::$countMammal." mammal alive in our world.\n"; 
        }
        else
        {
           echo "There are currently ".self::$countMammal." mammals alive in our world.\n"; 
        }
        return self::$countMammal;
    }
    static function getNumberOfFishes()
    {
        if(self::$countFish == 0)
        {
            echo "There is currently ".self::$countFish." fish alive in our world.\n";
        }
        elseif(self::$countFish == 1)
        {
            echo "There is currently ".self::$countFish." fish alive in our world.\n";
        }
        else
        {
            echo "There are currently ".self::$countFish." fish alive in our world.\n";
        }
        return self::$countFish;
    }
    static function getNumberOfBirds()
    {
        if(self::$countBird == 0)
        {
            echo "There is currently ".self::$countBird." birds alive in our world.\n";
        }
        elseif(self::$countBird == 1)
        {
            echo "There is currently ".self::$countBird." bird alive in our world.\n";
        }
        else
        {
            echo "There are currently ".self::$countBird." birds alive in our world.\n";
        }
        return self::$countBird;
    }
    function __destruct()
    {
        self::$countAnimal -= 1;

        if($this->_type == self::MAMMAL)
        {
            self::$countMammal -=1;
        }
        elseif($this->_type ==self::FISH)
        {
            self::$countFish -=1;
        }
        elseif($this->_type == self::BIRD)
        {
            self::$countBird -=1;
        }

    }


    
}



	