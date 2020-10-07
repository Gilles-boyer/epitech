<?php
/******************************************************************************
 * this fonction create by GiL 
 * update 18/06/2020
 * this fonction use with my_change_user() for : 
 * > update data name by first characters by maj and add 42
 * > display the modification name
 * this fonction take 2 parameters :
 * -> @param $bdd = object => instance PDO 
 * -> @param $names = array $name of function my_change_user
 *****************************************************************************/

function update_with_array( PDO $bdd, $name )
{
    foreach($name as $name_update)
    {
        $name_modified =  ucfirst($name_update);
        $name_modified = $name_modified."42";//modified name

        $req_update = $bdd -> prepare //req update
        ('UPDATE users SET name = :name_modified WHERE name = :name_update');
        $req_update -> execute( array ( 
            'name_update'   => $name_update, 
            'name_modified' => $name_modified
        ));
    }

    $req_display = $bdd->query //display
    ('
      SELECT   name
      FROM     users
      WHERE    name
      LIKE     "%42"
      ORDER BY length(name)
      AND      name
    ');
    while($display = $req_display->fetch())
    {
        echo $display['name']."\n";
    }
}

/******************************************************************************
 * this fonction create by GiL 
 * update 18/06/2020
 * the fonction is my_change_user(PDO $bdd, ...$names)
 * this fonction check if user in $name exist 
 * this fonction select table users and select name in user for to change :
 *  exemple “toto” => “Toto42” 
 * (first letter in uppercase, the rest in lowercase, and 42 added at the end)
 * if an error detected display PDOException with themessage “User not found"
 * return an array it's a request of table user contening :
 *  //name     //number of characters    //range by alphabetical order
 * this fonction take 2 parameters :
 * -> @param $bdd = object => instance PDO 
 * -> @param $names = string => array with string
 *****************************************************************************/
function my_change_user ( PDO $bdd, ...$name )
{
    $key = 0;
    foreach($name as $name_test)
    {
        //req select for to check value $name if same to bdd user name 
        $req_name = $bdd -> prepare( 'SELECT name FROM users WHERE name = ?' );
        $req_name -> execute( array ( $name_test ) );
        while( $bdd_name = $req_name -> fetch () )
        {
            $verify = $bdd_name['name'];
        }

        $key++;

        if( empty ( $verify ))
        {
            $value[$key] = false;
        }
        else
        {
            $value[$key] = $verify;
        }

        unset( $verify );
    }
    try
    {
        if( in_array( false, $value ))
        {
            throw new Exception( "User not found \n" );
            return false;//take error
        }
        else
        {
            update_with_array($bdd,$name);//update and display
        }
    }
    catch(Exception $e)
    {
        echo $e -> getMessage();
    }
    finally
    {
        echo "Good luck with the user DB!\n";
    }
    
}   