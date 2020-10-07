<?php
class Astronaut
{
    private $_name;
    private $_snacks = 0;
    private $_destination = null;
    private $_id;

    static private $_compteur = 0;
    static private $_eat = 1;
    

    /**@par : name = string donne le nom a l'astronaute
     * / retourne id +1 id = int / compteur = id +1
     * affichage message name astronaut*/
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
    function getSnacks()
    {
        return $this->_snaks;
    }
    function doActions($par=null)
    {
        if(is_null($par))
        {
            echo "$this->_name: Nothing to do.\n";

        }
        elseif((get_class($par))=="planet\Mars")
        {
            echo "$this->_name: started a mission !\n";
            $this->_destination = $par;
        }
        elseif((get_class($par))=="chocolate\Mars")
        {
            echo "$this->_name is eating mars number ".$par->getId().".\n";
            $this->_snacks = $this->_snacks +1;
        }
        else
        {

        }
    }
    function __destruct()
    {
        if(is_null($this->_destination))
        {
            echo "$this->_name: I may have done nothing, but I have $this->_snacks Mars to eat at least !\n";
        }
        else
        {
            echo "$this->_name: Mission aborted !\n";
        }
    }
}