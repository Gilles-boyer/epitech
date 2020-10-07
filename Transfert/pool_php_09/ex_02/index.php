<?php


if($_GET["name"]=="")
{
    $_GET["name"]="platypus";
}

echo 'Hello ' . htmlspecialchars($_GET["name"]);
