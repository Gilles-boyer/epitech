<?php

namespace chocolate;
{
 class Mars
 {

    private $_id;
 
    private static $_compteur = 0;//use count for id

    public function __construct()
    {  
    $this->_id = self::$_compteur++; //give value to $_id
    }
    function getId()
    {
    return $this->_id;
    }

 }
}
namespace planet;
{
 class Mars
 {
    private $_size;

    function __construct($size=null)
    {
        $this->_size = $size;
    }
    function getSize()
    {
        return $this->_size;
    }
    function setSize($size)
    {
        $this->_size = $size;
    }
 }
}
