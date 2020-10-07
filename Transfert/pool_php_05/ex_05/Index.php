<?php
include_once("Shark.php");
include_once("Canary.php") ;
$titi = new Canary("Titi");
$willy = new Shark("Willy");
$willy->status();
$willy->smellBlood(true);
$willy->status();
$titi->layEgg();
$titi->layEgg();
$willy->getName();
echo $willy->getLegs()."\n";
echo $titi->getEggsCount() . "\n";
animal::getNumberOfAnimalsAlive();
animal::getNumberOfFishes();
animal::getNumberOfBirds();
$willy->eat();
$willy->status();
$willy->eat($willy);
animal::getNumberOfAnimalsAlive();
animal::getNumberOfFishes();
animal::getNumberOfBirds();




