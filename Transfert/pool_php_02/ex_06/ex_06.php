<?php
function my_create_continent($continentNameToAdd,&$map)
{
    $map = array($continentNameToAdd);
    return $map;
}
function my_create_country($country, $continent,&$map)
{
    $map = [$continent => [$country]];
    return $map;
}
function my_create_city($city, $codepostal, $country, $continent,&$map)
{
    $map = [$continent => [$country => [$city=>$codepostal]]];
    return $map;
}





function get_country_of_continent($continentName, $worldMap)
{
    $result =  array_key_exists($continentName,$worldMap);

    if($result)
    {
    return $result;
    }
    else
    {
        echo "Failure to get continent.\n";
        return NULL;
    }
}

function get_cities_of_country($countryName, $continentName, $worldMap)
{
    $result =  array_key_exists($continentName, $worldMap);

    if($result)
    {   
        $result =  array_key_exists($countryName,$worldMap[$continentName]);
        if($result)
        {
            return $result;
        }
        else
        {
            echo "Failure to get continent.\n";
            return NULL;
        }
        
    }
    else
    {
        echo "Failure to get continent.\n";
        return NULL;
    }
}

function get_city_postal_code($cityName, $countryName, $continentName,$worldMap)
{
    $result =  array_key_exists($continentName, $worldMap);
    $check = $worldMap[$continentName];
    if($result)
    {   
        $result =  array_key_exists($countryName,$worldMap[$continentName]);
        if($result)
        {
            $result =  array_key_exists($cityName,$check[$countryName]);
            if($result)
            {
            return $result;
            }
            else
            {
            echo "Failure to get continent.\n";
            return NULL;
            }
        }
        else
        {
            echo "Failure to get continent.\n";
            return NULL;
        }
        
    }
    else
    {
        echo "Failure to get continent.\n";
        return NULL;
    }
}




