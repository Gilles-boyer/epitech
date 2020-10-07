<?php

/* this fonctio nmy_password_hash crypt password to md5 with  salt must be differenton each call
@par = $par = take a string
@return  = array($pasword,$salt)*/
function  my_password_hash($par)
{

    //$caracteres = list of character use for the salt
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longueurMax = strlen($caracteres); //check the size for caracteres
    $chaineAleatoire = '';

    for ($i = 0; $i < 8; $i++)//create random characters whit 8 characters
    {
        $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
    }

    $salt = "$1$".$chaineAleatoire."$"; //create salt for md5

    $passwordmd5 = crypt($par,$salt); // crypt to md5

    $array =[
        "hash" => $passwordmd5,  //stock in array
        "salt" => $salt
    ];

    return $array;

}

/* function my_password_verify for to check if the password hash with crypt(md5 password) is correct
@par : ($password = string  it's a word use by user ; $salt = string it's the salt to use for crypt() ;
$hash : string it's a password hash choice by users);
@return : true or false before to check if the password it's correct;*/
function my_password_verify($password, $salt, $hash)
{
    
    $verify = crypt($password, $salt); // cryp password enter by user

    if($verify == $hash) // check if the password enter it's same to password hash
    {
        return true;
    }
    else
    {
        return false;
    }

}


