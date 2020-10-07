<?php



class Gecko

{    
    private $_name;

   
    public function __construct($name = "")
    {
        $this->_name = $name;

        if(empty($name))
        {
            echo "Hello !\n";
        }
        else
        {
            echo "Hello $this->_name !\n";
        }
    }
    public function __destruct()
    {
        if(empty($this->_name))
        {
            echo "Bye $this->_name!\n";
        }
        else
        {
            echo "Bye $this->_name !\n";
        } 
    }
    public function getName()
    {
        return $this->_name;   
    }
  
}