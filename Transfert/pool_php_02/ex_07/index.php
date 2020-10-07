<?php
require("ex_07.php");

echo my_division_modulo(3,'/', 4) . "\n";
echo my_division_modulo(2,'/', 1) . "\n";
try
{
echo my_division_modulo(3,'+', 1) . "\n";
}
catch (Exception $err)
{
echo $err->getMessage();
}
try
{
echo my_division_modulo(2,'/', 0) . "\n";
}
catch (Exception $err)
{
echo $err->getMessage();
}