<?php

include_once("Gecko.php");
$thomas = new Gecko("Thomas");
$annonymus = new Gecko();
echo $thomas->name;
echo $annonymus->name . "\n";