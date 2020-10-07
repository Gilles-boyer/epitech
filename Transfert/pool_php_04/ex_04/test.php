<?php 

include_once("Mars.php");
include_once("Astronaut.php");


$gilles1 = new chocolate\Mars();
$gillesmange2 = new chocolate\Mars();
$gillesmange3 = new chocolate\Mars();
$gillesmange4 = new chocolate\Mars();

$gillesdestination = new planet\Mars(7.2);
$gilles = new Astronaut("gilles");


echo $gillesmange2->getId()."\n";

$gilles->doActions($gilles1);
$gilles->doActions($gillesmange4);

$gilles->doActions($gillesmange4);








