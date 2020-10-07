<?php

if(!empty($_GET['name']))
{
    $name = $_GET['name'];
}
elseif(!empty($_COOKIE['name']))
{
    
    $name = $_COOKIE['name'];
}
else
{
    $name = "platypus";
}

setcookie('name', $name , time() + 365*24*3600);

echo 'Hello ' . htmlspecialchars($_COOKIE['name']);
