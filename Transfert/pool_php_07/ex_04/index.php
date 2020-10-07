<?php

include_once 'Character.php';
include("Warrior.php");
include("Mage.php");


$warrior = new Warrior ("Gilles") ;
$warrior -> moveRight () ;
$warrior -> moveLeft () ;
$warrior -> moveDown () ;
$warrior -> moveUp () ;

$mage = new Mage ("Cedric") ;
$mage -> moveRight () ;
$mage -> moveLeft () ;
$mage -> moveDown () ;
$mage -> moveUp () ;