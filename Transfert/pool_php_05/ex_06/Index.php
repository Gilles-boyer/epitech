<?php
include_once("BlueShark.php");
include_once("GreatWhite.php");
include_once("Canary.php");
include_once("Cat.php");
include_once("Shark.php");


$willy = new BlueShark("willy");
$titi = new Canary("titi");
$gilles =  new Animal("gilles",2,Animal::FISH);
$blanc = new GreatWhite("blanc");
$cat = new Cat("felix");
unset($willy);

$blanc->eat();





