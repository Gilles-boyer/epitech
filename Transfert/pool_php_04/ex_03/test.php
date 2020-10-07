<?php 

include_once("Mars.php");
use planet\Mars;

$mars = new Mars(8.4);
echo $mars-> getSize()."\n";