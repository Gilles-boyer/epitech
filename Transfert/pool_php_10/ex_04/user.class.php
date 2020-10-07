<?php
try {
    $bdd = new PDO(
        'mysql:host=localhost;
                   port=3306;
                   dbname=epitech;
                   charset=utf8',
        'gilles',
        'gilles'
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
/*******************************************************************************
 * create by gil le 19/06/20 the name function checkValue($value)
 * this fonction check value for to see if there a value in the parameter
 * @param = mixed value
 * @return true or false;
 *****************************************************************************/
function checkValue($value)
{
    if (!isset($value)) {
        return false;
    } elseif (empty($value)) {
        return false;
    } else {
        return true;
    }
}
/*******************************************************************************
 * create by gil le 19/06/20 the name function formatValue($value)
 * this fonction test value for a problem XSS and delete space
 * this fonction print the specials characters
 * @param = string 
 * @return the clean string;
 *****************************************************************************/
function formatValue($value)
{
    $value = htmlspecialchars($value);
    $value = trim($value);
    $value = strip_tags($value);
    return $value;
}
/*******************************************************************************
 * create by gil le 19/06/20  function inserUserToBdd($name,$email,$password)
 * this fonction insert new user to bdd
 * @param = $name =  string 
 * @param = $password = string
 * @param = $email = string
 *****************************************************************************/
function inserUserToBdd($name, $email, $password, $bdd)
{
    $prepar_req = "INSERT INTO users(name, email, password, created_at)
                   VALUES('$name','$email','$password', now())";
    //req bdd
    $req = $bdd->exec($prepar_req);
}
/******************************************************************************
 * by gil le 20/06/20 the name function checkLen($value,$a,$b)
 * this fonction check $value with a min and a max len
 * @param = $value = string for to check
 * @param = $a = int = min len
 * @param = $b = int = max len
 * @return true or false;
 *****************************************************************************/
function checkLen($value, $a, $b)
{
    if (strlen($value) <= $a) {
        return false;
    }
    if (strlen($value) >= $b) {
        return false;
    } else {
        return true;
    }
}
/******************************************************************************
 * by gil le 20/06/20 the name function userExist($user,$bdd)
 * this fonction check if user exist in bdd
 * @param = $user = string name user
 * @param = $bdd = object bdd
 * @return true or false;
 *****************************************************************************/
function userExist($user, $bdd)
{
    $req = $bdd->prepare('SELECT email FROM users WHERE email = ?');
    $req->execute(array($user));
    $check = $req->fetch();
    if (empty($check['email'])) {
        return false;
    } else {
        return true;
    }
}
/******************************************************************************
 * by gil le 20/06/20 the name function passwordValid($user,$password,$bdd)
 * this fonction take a password of form for to compare with a password of bdd
 * @param = $user = string name user
 * @param = $password = string = password of form
 * @param = $bdd = object bdd
 * @return true or false;
 *****************************************************************************/
function passwordValid($user, $password, $bdd)
{
    $req = $bdd->prepare("SELECT password FROM users WHERE email =?");
    $req->execute(array($user));
    $check = $req->fetch();
    return password_verify($password, $check['password']);
}
/******************************************************************************
 * by gil le 20/06/20 the name function takeValueBdd($where,$table,$print,$bdd)
 * this fontion return $print 
 * @param = $where = mixed information to search
 * @param = $table = string = name table of bdd
 * @param = $print = mixed 
 * @param = $bdd = object bdd
 * @return value of $print ;
 *****************************************************************************/
function takeValueBdd($wheretable, $wheresearch, $table, $print, $bdd)
{
    $req_prepare = "SELECT $print FROM $table WHERE $wheretable = '$wheresearch'";
    $req = $bdd->query($req_prepare);
    $value = $req->fetch();
    return $value[$print];
}
