<?php

/******************************************************************************
 * this fonction create by GiL 
 * update 18/06/2020
 * the fonction name is my_password_change
 * ( PDO $bdd, string $login, string $new_password )
 * this fonction verify if user exist
 * if user exist this fonction change the old password by new password
 * this fonction use password_hash() and password_verify()
 * return an error if the password it's not good or user doesn't exist
 * this fonction take 3 parameters :
 * -> @param $bdd = object => instance PDO 
 * -> @param $login = string => mail user
 * -> @param $new_password = string => new password of the user
 *****************************************************************************/
 function my_password_change ( PDO $bdd, string $login, $new_password = null )
 {
    //req select email
    $req_select = $bdd -> prepare ('SELECT email FROM users WHERE email = ?');
    $req_select -> execute ( array ( $login ));

    $check = $req_select->fetch() ; 
    
        try
        {
            if( empty( $check['email'] && $new_password))
            {
                return false;
            }
            else
            {   
            //password hash
                $hash_password=password_hash($new_password, PASSWORD_DEFAULT);

                $req_update = $bdd -> prepare //req update
                ('UPDATE users SET password = :password WHERE email = :email');
                $req_update->execute ( array( 
                'email' => $login,    
                'password' => $hash_password
                ));
            }
            $req_update->closeCursor();
            $req_select->closeCursor();
        }
        catch( Exception $e )
        {
            echo $e -> getMessage()."\n";
        }
    
 }
 



