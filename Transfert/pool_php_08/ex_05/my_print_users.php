<?php
/******************************************************************************
 * this fonction create by Gil 
 * update 18/06/2020
 * the fonction name is check_int_array ( $id )
 * this fonction check if in array $id all value = int
 * this fonction return true if all value = int else false
 * this fonction take one parameters :
 * -> @param $id = array 
 *****************************************************************************/
function check_int_array ( $id )
{
    if ( isset( $id )) 
    {
        $key = 0;
        foreach ( $id as $key => $value )
        {
            $key++;

            if ( is_int( $value ))
            {
                $value = true;
            }
            else
            {
                $value = false;
            }

            $array[$key]=$value;
        }
    }
    else
    {
        return false;
    } 
    
    return !in_array ( false, $array );
}
/******************************************************************************
 * this fonction create by Gil 
 * update 18/06/2020
 * the fonction name is my_print_users (PDO $bdd [, int $id, . . . ])
 * this fonction check a validity of the parameters and return true or false.
 * this fonction print the name with the id give on parameters.
 * this fonction use a fonction check_int_array()
 * this fonction take two parameters :
 * -> @param $bdd = object to instance of PDO
 * -> @param ...$id = array, take only integer, it's id of table for PDO  
 *****************************************************************************/
function my_print_users ( PDO $bdd, ...$id )
{
    $id_valid = check_int_array( $id ); //true or false

    try
    {
        if( $id_valid )
        {
            foreach( $id as $value )
            {
                //prepare request 
                $req = $bdd->prepare ( 'SELECT name FROM users WHERE id = ?' );
                $req ->execute( array ( $value )); 
        
                while( $donne = $req->fetch ())//print value
                {
                    if(!empty( $donne ))
                    {
                        echo $donne['name']."\n";
                    }
                    else
                    {
                        return False;
                    }
                }
            }
            return true; 
        }
        else
        {
            throw new exception( 'Invalid id given\n' );
        }
    }
    catch ( Exception $e )
    {
        echo $e->getMessage()."\n";
        return false;
    }
}
