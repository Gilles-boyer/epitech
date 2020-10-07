<?php

function my_add_elem_map($key, $value, &$map)
{
    $add_map = array(

        $key => $value

    );

    $result = $map + $add_map;

    asort($result);

    return $result;
}

function my_modify_elem_map($key, $value, &$map)
{
    $add_map = array(

        $key => $value

    );

    $result = $add_map + $map;

    asort($result);

    return $result;
}

function my_delete_elem_map($key, &$map)
{
    $value = "delete";

    $add_map = array(

        $key => $value

    );

    $array = $add_map + $map;

    $result = array_splice($array,1);

    return $result;
}



function my_is_elem_valid($key, $value, &$map)
{
    $result = false;
    $arraycheckvalue = array_keys($map, $value, $strict = false);
    $checkarraykey = array_keys($arraycheckvalue, $key, $strict = false);

    if($arraycheckvalue == false)
    {
        echo "The given arguments aren't good.\n";
        return $result;
    }
    elseif($checkarraykey == false)
    {
        echo "The given arguments aren't good.\n";
        return $result;
    }
    else
    {
        $result = true ;
        return $result;
    }
}