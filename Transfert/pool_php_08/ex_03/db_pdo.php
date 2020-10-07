<?php

/* function connect_db() check connection to bdd and the error display
@param : $host = string adress of server , $username = string name for to connect to BDD , 
$passwd = string password for bdd , $port =  int it's port of server, 
$db = string it's name of bdd ; 
$return : error if the connection ok or not;*/
function connect_db($host, $username, $passwd, $port, $db)
{
    define("ERROR_LOG_FILE", './error_log_file.log');
    try
    {
        $bdd = new PDO('mysql:host='.$host.';dbname='.$db.';port='.$port.';charset=utf8', $username, $passwd, 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));//catch the error code
    }
    catch(Exception $e)
    {      
        error_log($e,3, ERROR_LOG_FILE);
        echo 'PDO ERROR : '.$e->getMessage().'storage in'.ERROR_LOG_FILE."\n"; 
    }

    return $bdd;
}