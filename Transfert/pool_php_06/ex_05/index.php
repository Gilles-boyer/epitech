<?php

include_once "AMonster.php";
include_once "ASpaceMarine.php";
include_once "PlasmaRifle.php";
include_once "PowerFist.php";
include_once "AWeapon.php";

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
class gun extends AWeapon
{
    public function __construct($name, $ap, $apcost,$var)
    {
        parent::__construct($name, $ap, $apcost, $var);
        
        
    }
    function attack()
    {
        
    }
}


$monster = new P("monster");
$troll = new P("troll");

$monster->equip();
echo $monster->getName()."\n";
$monster->attack($troll);
$monster->moveCloseTo($troll);
$monster->attack($troll);

$marine = new S("gilles");
$marine2 = new S("cedric");
$marine3 = new S("hugo");

$melee= true;
$gun1 = new gun("gun1", 5, 20, true);
$gun2 = new gun("gun2", 5, 20, true);

echo $marine->getName()."\n";
echo $marine2->getName()."\n";

$marine->equip($gun1);
$marine2->equip($gun2);

$marine->attack($marine2);
$marine->moveCloseTo($marine2);
var_dump($marine->attack($marine2));






