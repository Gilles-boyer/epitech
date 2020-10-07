<?php
session_start();

include_once('user.class.php');

$error_table = [
    1 => "Invalid name",
    2 => "Invalid email",
    3 => "Invalid password",
    4 => "Invalid password confirmation",
    5 => "Incorrect email",
    6 => "Incorrect password"
];
/////////////////////inscription form//////////////////////////////////////////
if (isset($_POST['submit_inscription'])) {
    if ($_POST['password'] == $_POST['password_confirmation']) {

        unset($_SESSION['display_error']);
        unset($_SESSION['display_confirmation']);

        $name     = $_POST['name'];
        $email    = $_POST['email'];
        $password = $_POST['password'];

        if (!checkValue($name)) {
            $_SESSION['display_error'] = $error_table[1];
        } elseif (!checkLen($name, 3, 10)) {
            $_SESSION['display_error'] = $error_table[1];
        } elseif (!checkValue($email)) {
            $_SESSION['display_error'] = $error_table[2];
        } elseif (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
            $_SESSION['display_error'] = $error_table[2];
        } elseif (!checkValue($password)) {
            $_SESSION['display_error'] = $error_table[3];
        } elseif (!checkLen($password, 3, 10)) {
            $_SESSION['display_error'] = $error_table[3];
        } else {
            //great value
            $password = formatValue($password);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $name = formatValue($name);
            $email = formatValue($email);

            inserUserToBdd($name, $email, $password, $bdd);

            $_SESSION['display_confirmation'] = 'User created';
        }
    } else {
        $_SESSION['display_error'] = $error_table[4];
    }
    header('location:inscription.php');
}
///////////////////////////////////////////////////////////////////////////////
//////////////////////////////Form Login///////////////////////////////////////
if (isset($_POST['submit_login'])) {
    $login = formatValue($_POST['email']);
    $password = formatValue($_POST['password']);
    unset($_SESSION['display_error']);

    if (!checkValue($login)) {
        $_SESSION['display_error'] = $error_table[5];
    } elseif (!checkValue($password)) {
        $_SESSION['display_error'] = $error_table[6];
    } elseif (!userExist($login, $bdd)) {
        $_SESSION['display_error'] = $error_table[5];
    } elseif (!passwordValid($login, $password, $bdd)) {
        $_SESSION['display_error'] = $error_table[3];
    } else {
        $_SESSION['user'] = takeValueBdd('email',$login,'users','name',$bdd);
        unset($_SESSION['display_error']);
        return header('location:index.php');
    }
    header('location:login.php');
}
///////////////////////////////////////////////////////////////////////////////
//////////////////////////////Form logout//////////////////////////////////////
if (isset($_POST['submit_logout']))
{
    unset($_SESSION['user']);
    header('location:login.php');
} 
///////////////////////////////////////////////////////////////////////////////
//////////////////////////////Form logout//////////////////////////////////////
