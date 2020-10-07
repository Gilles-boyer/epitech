<?php

include_once "AWeapon.php";

class plasmaRifle extends AWeapon
{  
    function __construct()
    {
        parent::__construct("Plasma Rifle",5,21);
    }
    function  attack()
    {
        echo "PIOU\n";
    }


}