<?php
session_start();
////////////////////////include////////////////////////////////////////////////
spl_autoload_register(function ($class) {
    include_once('class/' . $class . '.class.php');
});
/////////////////////////connect_bdd///////////////////////////////////////////
$bdd = new Bdd;
////////////////////////Error list/////////////////////////////////////////////

$error_table = [
    1 => "* Invalid firstname",
    2 => "* Invalid lastname",
    3 => "* Invalid email",
    4 => "* Invalid password",
    5 => "* Invalid password confirmation",
    6 => "* this User already exist",
    7 => "* Incorrect email",
    8 => "* Incorrect password",
    9 => "* User do not exist",
    /************ADMIN***************/
    10 => "* you can't delete an admin !",
    11 => "* you are not an admin !",
    12 => "* Are you sure you want to delete this product ?"
];
////////////////////////////confirmation list//////////////////////////////////
$confirmation_table = [
    1 => "Valid firstname.",
    2 => "Valid lastname.",
    3 => "Valid email.",
    4 => "Valid password.",
    5 => "Valid password confirmation.",
    6 => "Your account is created.",
    /************ADMIN***************/
    7 => "Admin account is created.",
    8 => "User is become admin.",
    9 => "All users are displayed.",
    10 => "User is Edited.",
    11 => "User is Deleted.",
    12 => "All products are displayed.",
    13 => "The product is edited.",
    14 => "The New product is Added.",
    15 => "The product is Deleted",
    16 => "The new category is created"
];
///////////////////////////////////////////////////////////////////////////////
///////////////////////FORM Sign-up////////////////////////////////////////////
if (isset($_POST['submitInscription'])) {
    $_SESSION['lastName'] = $lastName = Control::formatValue($_POST['lastName']);
    $_SESSION['firstName'] = $firstName = Control::formatValue($_POST['firstName']);
    $_SESSION['email'] = $email = Control::formatValue($_POST['email']);
    $password = Control::formatValue($_POST['password']);
    $confirmPassword = Control::formatValue($_POST['passwordConfirmation']);
    $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
    unset($_SESSION['errorEmail']);
    unset($_SESSION['errorLastName']);
    unset($_SESSION['errorFirstName']);
    unset($_SESSION['errorPassword']);
    unset($_SESSION['errorConfirm']);

    if (Control::fieldExist('users', 'email', 'email', 'email', $email, $bdd)) {
        $_SESSION['errorEmail'] = $error_table[6];
    } elseif (!Control::checkValue($lastName)) {
        $_SESSION['errorLastName'] = $error_table[2];
    } elseif (!Control::checkLen($lastName, 2, 21)) {
        $_SESSION['errorLastName'] = $error_table[2];
    } elseif (!Control::checkValue($firstName)) {
        $_SESSION['errorFirstName'] = $error_table[1];
    } elseif (!Control::checkLen($firstName, 2, 21)) {
        $_SESSION['errorFirstName'] = $error_table[1];
    } elseif (!Control::checkValue($email)) {
        $_SESSION['errorEmail'] = $error_table[3];
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errorEmail'] = $error_table[3];
    } elseif (!Control::checkValue($password)) {
        $_SESSION['errorPassword'] = $error_table[4];
    } elseif (!Control::checkLen($password, 2, 12)) {
        $_SESSION['errorPassword'] = $error_table[4];
    } elseif (!preg_match($pattern, $password)) {
        $_SESSION['errorPassword'] = $error_table[4];
    } elseif (!control::checkValue($confirmPassword)) {
        $_SESSION['errorConfirm'] = $error_table[5];
    } elseif (!($password == $confirmPassword)) {
        $_SESSION['errorConfirm'] = $error_table[5];
    } else {

        Users::inscriptionUser($firstName, $lastName, $email, $password, $bdd);
        $_SESSION['confirmation'] = $confirmation_table[6];
        unset($_SESSION['lastName']);
        unset($_SESSION['firstName']);
        unset($_SESSION['email']);
    }
    header('location:signup_form.php');
}
