<?php

include_once "Character.php";
include_once "Warrior.php";
include_once "Mage.php";


$warrior = new Warrior ("Gilles") ;
$warrior -> moveRight () ;
$warrior -> moveLeft () ;
$warrior -> moveDown () ;
$warrior -> moveUp () ;

$mage = new Warrior ("Cedric") ;
$mage -> moveRight () ;
$mage -> moveLeft () ;
$mage -> moveDown () ;
$mage -> moveUp () ;