<?php



interface IUnit
{
    public function equip($par);
    public function attack($par);
    public function receiveDamage(int $par);
    public function moveCloseTo($par);
    public function recoverAP();

}