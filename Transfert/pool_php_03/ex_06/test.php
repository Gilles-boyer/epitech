<?php

include_once("Gecko.php");

$hugo = new Gecko();
$gilles = new Gecko("Gilles",0);
unset($gilles);
$hugo->setName("hugo");
$hugo->setAge(0);
echo $hugo->getName()."\n";
echo $hugo->getAge()."\n";
$hugo->status();
$hugo->setAge(1);
$hugo->status();
$dylan = new Gecko();
$dylan->hello("titi");
$dylan->hello(5);
$dylan->eat("vegetable");
echo $dylan->getEnergy()."\n";





