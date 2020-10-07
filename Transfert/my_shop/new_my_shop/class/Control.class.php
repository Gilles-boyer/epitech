<?php
include_once('class/Bdd.class.php');

class Control
{
    //passwordValid
    //Userexixt
    //
    /*****************************************************************************
     * by gil le 20/06/20 the name function checkLen($value,$a,$b)
     * this fonction check $value with a min and a max len
     * @param = $value = string for to check
     * @param = $a = int = min len
     * @param = $b = int = max len
     * @return true or false;
     *****************************************************************************/
    static function checkLen($value, $a, $b)
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

    
    /*****************************************************************************
     * create by gil le 19/06/20 the name function formatValue($value)
     * this fonction test value for a problem XSS and delete space
     * this fonction print the specials characters
     * @param = string 
     * @return the clean string;
     *****************************************************************************/
    static function formatValue($value)
    {
        $value = htmlspecialchars($value);
        $value = trim($value);
        $value = strip_tags($value);
        return $value;
    }

    /******************************************************************************
     * create by gil le 19/06/20 the name function checkValue($value)
     * this fonction check value for to see if there a value in the parameter
     * @param = mixed value
     * @return true or false;
     *****************************************************************************/
    static function checkValue($value)
    {
        if (!isset($value)) {
            return false;
        } elseif (empty($value)) {
            return false;
        } else {
            return true;
        }
    }

    static function fieldExist($table, $field, $value, $wherefield, $wheresearch, $bdd)
    {
        $check = $bdd->selectValueBddWhere($field, $table, $value, $wherefield, $wheresearch);
        if (empty($check)) {
            return false;
        } else {
            return true;
        }
    }
}
