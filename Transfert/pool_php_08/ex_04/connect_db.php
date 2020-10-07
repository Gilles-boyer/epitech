<?php
$argv;
if(!(isset($argv[1]) //test les arguments saisie dans le terminal 
    && isset($argv[2]) 
    && isset($argv[3]) 
    && isset($argv[4])
    && isset($argv[5])
  ))
{
    echo "Bad params! Usage: php connect_db.php host username pass-word port db\n";
}
else
{
    
    function connect_db($host, $username, $passwd, $port, $db)
    {
    define("ERROR_LOG_FILE", './errors.log');
    try
    {
        $bdd = new PDO('mysql:host='.$host.';dbname='.$db.';port='.$port.';charset=utf8', $username, $passwd, 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));//catch the error code
        echo "Connection to DBsuccessful\n";//connection great
    }
    catch(Exception $e)
    {      
        error_log($e,3, ERROR_LOG_FILE);
        echo 'PDO ERROR : '.$e->getMessage().'storage in'.ERROR_LOG_FILE."\n";
        echo "Error connection to DB\n"; //failled connection 
    }
    }

    $verify = connect_db($argv[1],$argv[2],$argv[3],$argv[4],$argv[5]);//edite the value
}