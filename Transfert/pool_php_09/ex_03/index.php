<?php
session_start();

if($_SESSION['name']=="")
{
    $_SESSION['name'] = "platypus";
}
elseif(!empty($_GET['name']))
{
    $_SESSION['name'] = $_GET['name'];
}

echo 'Hello ' . htmlspecialchars($_SESSION['name']);
