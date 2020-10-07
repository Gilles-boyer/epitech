<?php
session_start();

include_once('user.class.php');

$error_table = [
    1 => "Invalid name",
    2 => "Invalid email",
    3 => "Invalid password",
    4 => "Invalid password confirmation",
    5 => "Incorrect email",
    6 => "Incorrect password",
    7 => "You can’t delete an administrator"
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
        $_SESSION['user'] = takeValueBdd('email', $login, 'users', 'name', $bdd);
        $_SESSION['id'] = takeValueBdd('email', $login, 'users', 'id', $bdd);
        $_SESSION['admin'] = takeValueBdd('email', $login, 'users', 'is_admin', $bdd);

        unset($_SESSION['display_error']);

        if ($_POST['remember_me'] == "remember_me") {
            setcookie('user', $_SESSION['user'], time() + 365 * 24 * 3600);
        }

        return header('location:index.php');
    }
    header('location:login.php');
}
///////////////////////////////////////////////////////////////////////////////
//////////////////////////////Form logout//////////////////////////////////////
if (isset($_POST['submit_logout'])) {
    unset($_SESSION['user']);
    unset($_SESSION['id']);
    unset($_SESSION['admin']);
    setcookie('user');
    header('location:login.php');
}
///////////////////////////////////////////////////////////////////////////////
//////////////////////////////Form setting/////////////////////////////////////
if (isset($_POST['submit_setting'])) {
    $name = formatValue($_POST['name']);
    $email = formatValue($_POST['email']);
    $id = $_SESSION['id'];

    if (!checkValue($name)) {
        $_SESSION['display_error'] = $error_table[1];
    } elseif (!checkLen($name, 3, 10)) {
        $_SESSION['display_error'] = $error_table[1];
    } elseif (!checkValue($email)) {
        $_SESSION['display_error'] = $error_table[2];
    } elseif (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
        $_SESSION['display_error'] = $error_table[2];
    } else {
        if (empty($_POST['password'])) {
            $champs_without_password = "name = :name, email = :email";
            $array_without_password = array(
                'name' => $name,
                'email' => $email,
                'id' => $id,
            );
            updateValueBddWithId(
                'users',
                $champs_without_password,
                $array_without_password,
                $bdd
            );
            $_SESSION['display_confirmation'] = 'User modified';
        } else {
            if ($_POST['password'] == $_POST['password_confirmation']) {

                $password = formatValue($_POST['password']);

                if (!checkLen($password, 3, 10)) {
                    $_SESSION['display_error'] = $error_table[3];
                } else {
                    $password = password_hash($password, PASSWORD_DEFAULT);

                    $array_with_password = array(
                        'name' => $name,
                        'email' => $email,
                        'password' => $password,
                        'id' => $id
                    );
                    $champs_with_password = "name = :name, 
                                            email = :email, 
                                            password = :password";
                    updateValueBddWithId(
                        'users',
                        $champs_with_password,
                        $array_with_password,
                        $bdd
                    );

                    $_SESSION['display_confirmation'] = 'User modified';
                }
            } else {
                $_SESSION['display_error'] = $error_table[4];
            }
        }
        $_SESSION['user'] = $name;
        setcookie('user');
    }
    return header('location:modify_account.php');
}
///////////////////////////////////////////////////////////////////////////////
//////////////////////////////Form setting/////////////////////////////////////
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    unset($_SESSION['display_error']);

    if (takeValueBdd('email', $delete, 'users', 'is_admin', $bdd)) {
        $_SESSION['display_error'] = $error_table[7];
    } else {
        $req_delete = $bdd->prepare('DELETE FROM users WHERE email = :email');
        $req_delete->execute(array(
            'email' => $delete
        ));
        $_SESSION['display_confirmation'] = 'User delete';
    }
    header('location:admin.php');
}
