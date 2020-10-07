<?php

include_once('Bdd.class.php');

class Users
{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $admin;
    
    function __construct($login,$bdd)
    {
        $this->id = $bdd->selectValueBddWhere('id', 'users', 'id', 'email', $login);
        $this->firstname = $bdd->selectValueBddWhere('firstname', 'users', 'firstname', 'email', $login);
        $this->lastname = $bdd->selectValueBddWhere('lastname', 'users', 'lastname', 'email', $login);
        $this->email = $bdd->selectValueBddWhere('email', 'users', 'email', 'email', $login);
        $this->admin = $bdd->selectValueBddWhere('admin', 'users', 'admin', 'email', $login);
    }

    function getId()
    {
        return $this->id;
    }

    function getFirstName()
    {
        return $this->firstname;
    }

    function getLastName()
    {
        return $this->lastname;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getAdmin()
    {
        return $this->admin;
    }

    static function inscriptionUser($firstname,$lastname,$email,$password,$bdd)
    {
        $password = password_hash($password,PASSWORD_BCRYPT);
        $firstname = strtolower($firstname);
        $firstname = ucfirst($firstname);
        $lastname = strtoupper($lastname);
        $email = strtolower($email);
        $table = "users(firstname,lastname,email,password)";
        $value = "'$firstname', '$lastname', '$email','$password'";

        $bdd->insertValueBdd($table, $value);
    }
    static function controlUser($login,$password,$bdd) {
        $userPasswordBdd = $bdd->selectValueBddWhere(
            'password', 'users', 'password', 'email', $login);
        
        return password_verify($password,$userPasswordBdd);
    }

    function updateUserWithoutPassword($firstname,$lastname,$email,$bdd)
    {
        $firstname = strtolower($firstname);
        $firstname = ucfirst($firstname);
        $lastname = strtoupper($lastname);
        $email = strtolower($email);
        $champs = 'firstname = ?, lastname = ?, email = ?';
        $array = [$firstname,$lastname,$email];
        $bdd->updateValueBddWhere('users',$champs,$array, 'id', $this->getId());
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
    }

    function updatePassword($password,$bdd)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $champs = 'password: ?';
        $array = [$password];
        $bdd->updateValueBddWhere('users',$champs,$array, 'id', $this->getId());
    }

}

class Admin extends Users
{
    function updateModeAdmin($idUser,$bdd)
    {
        $champs = 'admin: ?';
        $array = [$idUser];
        $bdd->updateValueBddWere('users',$champs,$array, 'id', $this->id);
    }
    function deleteUser($id, $bdd)
    {
        $bdd->deleteValueBddWhere('users','id',$id);
    }
}