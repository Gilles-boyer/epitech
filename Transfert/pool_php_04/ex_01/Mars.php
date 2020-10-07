<?php

class Mars
{
 private $_id;
 
 private static $_compteur = 0;//use count for id

 public function __construct()
 {  
  $this->_id = self::$_compteur++; // 
 }
 function getId()
 {
   return $this->_id;
 }
}