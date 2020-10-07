<?php

include_once "Warrior.php";
include_once "Mage.php";

$warrior = new Warrior("gilles");
$mage = new Mage("cedric");

$warrior->attack();
$mage->attack();