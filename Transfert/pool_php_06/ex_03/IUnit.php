<?php

interface IUnit
{
    public function equip($par);
    public function attack($par);
    public function receiveDamage($par);
    public function moveCloseTo($par);
    public function recoverAP();

}