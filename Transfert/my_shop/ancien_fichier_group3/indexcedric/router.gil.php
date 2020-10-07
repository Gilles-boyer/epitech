<?php
session_start();
////////////////////////include////////////////////////////////////////////////
spl_autoload_register(function ($class) {
    include_once('class/' . $class . '.class.php');
});
/////////////////////////connect_bdd///////////////////////////////////////////
$bdd = new Bdd;
/////////////////////////objet User///////////////////////////////////////////
if (!empty($_SESSION['login'])) {
    $nouveauTab = unserialize($_SESSION['login']);
    $user = $nouveauTab["monObjet"];
}
////////////////////////Error list/////////////////////////////////////////////

$error_table = [
    1 => "* Invalid firstname",
    2 => "* Invalid lastname",
    3 => "* Invalid email",
    4 => "* Invalid password",
    5 => "* Invalid password confirmation",
    6 => "* this User already exist",
    7 => "* Incorrect login",
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
    5 => "Your account is modified.",
    6 => "Your account is created.",
    /************ADMIN***************/
    7 => "Admin account is created.",
    8 => "User is become admin.",
    9 => "User remove Mode Admin",
    10 => "User is Edited.",
    11 => "User is Deleted.",
    12 => "All products are displayed.",
    13 => "The product is edited.",
    14 => "The New product is Added.",
    15 => "The product is Deleted",
    16 => "The new category is created"

];
///////////////////////////////////////////////////////////////////////////////
/////////////////////////////FORM Sign-up//////////////////////////////////////
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
    } elseif (
        !(Control::checkValue($lastName)
            and Control::checkLen($lastName, 2, 21))
    ) {
        $_SESSION['errorLastName'] = $error_table[2];
    } elseif (
        !(Control::checkValue($firstName)
            and Control::checkLen($firstName, 2, 21))
    ) {
        $_SESSION['errorFirstName'] = $error_table[1];
    } elseif (
        !(Control::checkValue($email)
            and filter_var($email, FILTER_VALIDATE_EMAIL))
    ) {
        $_SESSION['errorEmail'] = $error_table[3];
    } elseif (
        !(Control::checkValue($password)
            and Control::checkLen($password, 2, 12)
            and preg_match($pattern, $password))
    ) {
        $_SESSION['errorPassword'] = $error_table[4];
    } elseif (
        !(control::checkValue($confirmPassword)
            and $password == $confirmPassword)
    ) {
        $_SESSION['errorConfirm'] = $error_table[5];
    } else {
        Users::inscriptionUser($firstName, $lastName, $email, $password, $bdd);
        $_SESSION['confirmation'] = $confirmation_table[6];
        unset($_SESSION['lastName']);
        unset($_SESSION['firstName']);
        unset($_SESSION['email']);
    }
    header('location:formsignup.php');
}
///////////////////////////////////////////////////////////////////////////////
///////////////////////////FORM Sign-in////////////////////////////////////////
if (isset($_POST['submit_signin'])) {
    $_SESSION['email'] = $email = Control::formatValue($_POST['email']);
    $password = Control::formatValue($_POST['password']);
    $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
    $remember = Control::formatValue($_POST['remember']);
    unset($_SESSION['errorEmail']);
    unset($_SESSION['errorPassword']);

    if (!Control::fieldExist('users', 'email', 'email', 'email', $email, $bdd)) {
        $_SESSION['errorEmail'] = $error_table[9];
    } elseif (
        !(Control::checkValue($email)
            and filter_var($email, FILTER_VALIDATE_EMAIL))
    ) {
        $_SESSION['errorEmail'] = $error_table[7];
    } elseif (
        !(Control::checkValue($password)
            and Control::checkLen($password, 2, 12)
            and preg_match($pattern, $password)
            and Users::controlUser($email, $password, $bdd))
    ) {
        $_SESSION['errorPassword'] = $error_table[8];
    } else {
        $objet = new Users($email, $bdd);

        $_SESSION['confirmation'] = "Welcome " . $objet->getFirstName() . ' ' . $objet->getLastName();
        $tab = array("monObjet" => $objet);
        $_SESSION['login'] = serialize($tab);
        if ($remember = 1) {
            setcookie('login', $_SESSION['login'], time() + 365 * 24 * 3600);
        }
    }
    header('location:formsignin.php');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////LOGOUT/////////////////////////////////////////
if (isset($_GET['logout'])) {
    session_unset();
    setcookie('login');
    header('location:index.php');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////SETTING////////////////////////////////////////
if (isset($_POST['submitSettingUser'])) {
    $lastName = Control::formatValue($_POST['lastName']);
    $firstName = Control::formatValue($_POST['firstName']);
    $email = Control::formatValue($_POST['email']);
    $password = Control::formatValue($_POST['password']);
    $confirmPassword = Control::formatValue($_POST['passwordConfirmation']);
    $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';

    unset($_SESSION['errorEmail']);
    unset($_SESSION['errorLastName']);
    unset($_SESSION['errorFirstName']);
    unset($_SESSION['errorPassword']);
    unset($_SESSION['errorConfirm']);

    if (
        !(Control::checkValue($lastName)
            and Control::checkLen($lastName, 2, 21))
    ) {
        $_SESSION['errorLastName'] = $error_table[2];
    } elseif (
        !(Control::checkValue($firstName)
            and Control::checkLen($firstName, 2, 21))
    ) {
        $_SESSION['errorFirstName'] = $error_table[1];
    } elseif (
        !(Control::checkValue($email)
            and filter_var($email, FILTER_VALIDATE_EMAIL))
    ) {
        $_SESSION['errorEmail'] = $error_table[3];
    } else {

        if (Control::checkvalue($password)) {
            if (
                !(Control::checkLen($password, 2, 12)
                    and preg_match($pattern, $password))
            ) {
                $_SESSION['errorPassword'] = $error_table[4];
            } elseif (
                !(control::checkValue($confirmPassword)
                    and $password == $confirmPassword)
            ) {
                $_SESSION['errorConfirm'] = $error_table[5];
            } else {
                $user->updatePassword($password,$bdd);
            }
        }
        $user->updateUserWithoutPassword($firstName, $lastName, $email, $bdd);
        $_SESSION['confirmation'] = $confirmation_table[5];
        unset($_SESSION['lastName']);
        unset($_SESSION['firstName']);
        unset($_SESSION['email']);
        unset($_SESSION['login']);

        $objet = new Users($email, $bdd);
        $tab = array("monObjet" => $objet);
        $_SESSION['login'] = serialize($tab);
        if (!empty($_COOKIE['login'])) {
            setcookie('login');
            setcookie('login', $_SESSION['login'], time() + 365 * 24 * 3600);
        }
    }
    header('location: settingUser.php');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////DELETE USER////////////////////////////////////
if(isset($_GET['iddelete'])) {
    $id = $_GET['id_admin'];
   
        $bdd->deleteValueBddWhere('users','id',$id);
        $_SESSION['confirmation'] = $confirmation_table[11];

    header('location: admin.php');
}
///////////////////////////////////////////////////////////////////////////////
////////////////////////////////ADMIN MODE/////////////////////////////////////
if(isset($_GET['admin'])) {
    $id = $_GET['id_admin'];

    if($_GET['admin']== 1){
        $champs = 'admin = ?';
        $array = [1];
        $bdd->updateValueBddWhere('users',$champs,$array, 'id', $id);

        $_SESSION['confirmation'] = $confirmation_table[8];
    } elseif ($_GET['admin']== 0) {
        $champs = 'admin = ?';
        $array = [0];
        $bdd->updateValueBddWhere('users',$champs,$array, 'id', $id);

        $_SESSION['confirmation'] = $confirmation_table[9];
    }
    header('location: admin.php');
}