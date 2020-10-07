<?php

include_once "AMonster.php";
include_once "ASpaceMarine.php";

class P extends AMonster
{
    public function __construct($par)
    {
        parent::__construct($par);
    }
}
class S extends ASpaceMarine
{
    public function __construct($par)
    {
        parent::__construct($par);
    }
}


$monster = new P("monster");
$troll = new P("troll");

$monster->equip();
echo $monster->getName()."\n";
$monster->attack($troll);
$monster->moveCloseTo(3);





