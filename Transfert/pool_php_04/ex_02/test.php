<?php
include_once("Astronaut.php");
    
$gilles = new Astronaut("Gilles");
$cedric = new Astronaut("Cedric");
echo $gilles->getId()."\n";
echo $cedric->getId()."\n";
