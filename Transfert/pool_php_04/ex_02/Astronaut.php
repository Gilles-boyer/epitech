<?php

class Astronaut
{
    private $_name;
    private $_snacks = 0;
    private $_destination = null;
    private $_id;

    static private $_compteur = 0;
    /**@par : name = string donne le nom a l'astronaute
     * / retourne id +1 id = int / compteur = id +1
     * affichage message name astronaute*/
    function __construct($name) 
    {
        $this->_name = $name;
        $this->_id = self::$_compteur++;
        echo "$this->_name ready for launch !\n";
    }
    function getId()
    {
        return $this->_id;
    }
    function getDestination()
    {
        return $this->_destination;
    }
}