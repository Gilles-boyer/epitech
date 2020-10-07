<?php

class Animal
{
    private $_name; //donne le nom de l'objet animal
    private $_legs; //donne le nombre patte de l'animal ne peut être inferieur a 4
    private $_type; //donne le type d'animal ex : oiseau

    const MAMMAL=0; //defini que 0 vaut "mammal"
    const FISH=1; //defini que 1 vaut "fish"
    const BIRD=2; //defini que 2 vaut "bird"

    //prend en parametre obligatoire "un nom" "le nombre de jambes" "un type"
	function __construct($name, $legs, $type) {

        $this->_name = $name; //donne un nom
        $this->_legs = $legs; //le nombre de jambe
        $this->_type = $type; //le type d'animal
        $stock = null; //init var stock pour if
        if($this->_type == self::MAMMAL) // test la condition pour affichage mess
        {
            $stock = "mammal"; //mammal 0
        }
        elseif($this->_type == self::FISH)
        {
            $stock = "fish";//fish 1
        }
        elseif($this->_type == self::BIRD)
        {
            $stock = "bird";// bird 2
        }
        
        echo "My name is $this->_name and I am a $stock!\n";

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

    
}



	