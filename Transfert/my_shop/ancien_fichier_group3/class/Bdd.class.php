<?php

class Bdd
{

    protected static $bdd;
    protected const SERVER = 'mysql:host=localhost;port=3306;dbname=my_shop;
                   charset=utf8';
    protected const LOGIN = 'gilles';
    protected const PASSWORD = 'gilles';

    //create connexion to bdd
    function __construct()
    {
        try {
            self::$bdd = new PDO(self::SERVER, self::LOGIN, self::PASSWORD);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /******************************************************************************
     * by gil  et cedric le 26/06/20 the name function selectValueBdd($fields,$table, $value)
     * this fontion return $print 
     * @param = $fields = string = list of field
     * @param = $table = string = name table
     * @param = $value = string = inserted field
     *****************************************************************************/
    function selectValueBdd($fields, $table)
    {
        $prepar = 'SELECT ' . $fields . ' FROM ' . $table . '';
        $req = self::$bdd->query($prepar);
        return $req;
    }
     /******************************************************************************
     * by gil et cedric le 26/06/20 the name function selectValueBddWhere($fiels,$table, $value,$wherefield, $wheresearch)
     * this fontion return $print 
     * @param = $fields = string = list of field
     * @param = $table = string = name table
     * @param = $value = string = inserted field
     * @param = $wherefield = string = the field
     * @param = $wheresearch = mixed = searched field
     *****************************************************************************/
    function selectValueBddWhere($fields, $table, $value, $wherefield, $wheresearch)
    {
        $prepar = "SELECT $fields FROM $table WHERE $wherefield = '$wheresearch'";
        $req = self::$bdd->query($prepar);
        while ($print = $req->fetch()) {
            return $print[$value];
        }
    }
     /******************************************************************************
     * by gil et cedric le 26/06/20 the name function insertValueBdd($table,$value)
     * this fontion return $print 
     * @param = $table = string = name table
     * @param = $value = string = inserted field
     * Test
     * //$table = "users(firstname,lastname,username,email,password)";
     * //$value = "'hugo', 'boyer','test','hugo@hugo.fr','gilles'";
     *****************************************************************************/
    function insertValueBdd($table, $value)
    {
        $prepar_req = "INSERT INTO $table
                   VALUES($value)";
        //req bdd
        self::$bdd->exec($prepar_req);
    }
    /******************************************************************************
     * by gil et cedric le 26/06/20 the name function updateValueBddWhere($table, $champs, $array,$wherefield, $wheresearch)
     * this fontion return $print 
     * @param = $table = string = name table
     * @param = $field = string = list of field
     * @param = $array = array list of table
     * @param = $wherefield = string = the field
     * @param = $wheresearch = string = searched field
     * Test
     * //$champs = 'lastname = ?, firstname = ?';
     * //$array = ['cedric','test'];
     * //$requete->updateValueBddWere('users',$champs,$array, 'id', 1);
     *****************************************************************************/
    function updateValueBddWhere($table, $field, $array, $wherefield, $wheresearch)
    {
        $req_update = "UPDATE $table
                   SET $field
                   WHERE $wherefield = '$wheresearch'";

        $req = self::$bdd->prepare($req_update);
        $req->execute($array);
    }

    //this fonctions use for delete in BDD take 3 parameters
    //@param $table = sting = name table
    //@param $wherfield = string = name of filed for to search
    //@param $wheresearch = string = value to search
    //$requete->deleteValueBddWhere('users','id','2');
    function deleteValueBddWhere($table, $wherefield, $wheresearch)
    {
        $req_delete = "DELETE FROM $table WHERE $wherefield = '$wheresearch'";
        self::$bdd->query($req_delete);
    }

    //destruct connexion
    function __destruct()
    {
        self::$bdd = "";
    }

    function selectValueBddWhereMulti($fields, $table, $wherefield, $wheresearch)
    {
        $prepar = "SELECT $fields FROM $table WHERE $wherefield = '$wheresearch'";
        $req = self::$bdd->query($prepar);
        
        return $req;
    }   

}
