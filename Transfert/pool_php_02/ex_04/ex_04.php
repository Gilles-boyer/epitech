<?php

function my_password_hash($password)
{
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $result = array();
    $salt = "";
    $passwordhach = "";
    $chaineAleatoire = '';


        for ($i = 0; $i < 9; $i++)
        {
            $chaineAleatoire.= $caracteres[rand(0, 9)];
        }

        $salt = "$1$".$chaineAleatoire;

        $passwordhach = crypt($password, $salt);
    
        //print result in array
        $result = [
        "hash" => $passwordhach,
        "salt" => $salt
        ];

    return $result;
}


function my_password_verify($password, $salt, $hash)
{

    $result = false;
    $verify = "";

    $verify = crypt($password,$salt);

    if($verify == $hash)
    {
        $result = true;
        return $result; 
    }
    else
    {
        return $result;
    }
}






 


