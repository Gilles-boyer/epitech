<?php

/******************************************************************************
 * this fonction create by GiL 
 * update 18/06/2020
 * fonction name  my_show_db (PDO $bdd , string $table)
 * this fonction return yield table if exist or return null if error
 * this fonction take 2 parameters :
 * -> @param $bdd = object => instance PDO 
 * -> @param $table = string name table for bdd
 * -> @return print table or null
 *****************************************************************************/
function my_show_db (PDO $bdd ,  $table)
{

    $concat = 'SELECT * FROM ' . $table; //query with variable
    $result = $bdd->query($concat);//req
    $test = $result->fetchAll(PDO::FETCH_CLASS);

    if(empty($test))
    {
        return null;
    }
    else
    {
        foreach($test as $value)
        {
            yield print_r($value);
        }
    }    
}

