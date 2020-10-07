<?php


$map = array(
  "fr" => "francais",
  "run" => "créole",
  "en" => "france"
);

$key = "en";

$value = "delete";

$add_map = array(

  $key => $value

);

$array = $add_map + $map;


unset($array[array_search($value,$array)]);


function my_is_elem_valid($key, $value, array $map)
{
    $result = false;
    $arraycheckvalue = array_keys($map, $value, $strict = false);
    $checkarraykey = array_keys($arraycheckvalue, $key, $strict = false);
    if(!isset($map))
    {
      echo "The given arguments aren't good.\n";
      return $result;
    }
    elseif($arraycheckvalue == false)
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
print_r(my_is_elem_valid("fr","francais",$ma));















