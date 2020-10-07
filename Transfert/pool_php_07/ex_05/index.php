<?php

include("Warrior.php");
include("Mage.php");


$warrior = new Warrior ("Gilles") ;
$warrior -> moveRight () ;
$warrior -> moveLeft () ;
$warrior -> moveDown () ;
$warrior -> moveUp () ;
$warrior->unsheathe();

$mage = new Mage ("Cedric") ;
$mage -> moveRight () ;
$mage -> moveLeft () ;
$mage -> moveDown () ;
$mage -> moveUp () ;