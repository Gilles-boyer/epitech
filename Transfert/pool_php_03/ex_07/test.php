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
$dylan->hello("cedric");
$dylan->hello(2);
$dylan->setEnergy(0)."\n";
$dylan->eat("CACA");
echo $dylan->getEnergy()."\n";
$dylan->work();
echo $dylan->getEnergy()."\n";







