<?php

function checkvalue()
{
    $check = false;
    if(class_exists("Arcaniste"))
    {
        echo "test 1 = ok \n";
        $test = new Arcaniste();
    }
    else
    {
        echo "test 1 = ko \n";
    }

    if(is_subclass_of($test, "AUnit"))
    {
        echo "test 2 = ok \n";
        $check = true;
    }
    else
    {
        echo "test 2 = ko \n";
    }

    if(is_subclass_of($test, "IPerso"))
    {
        echo "test 3 = ok \n";
    }
    else
    {
        echo "test 3 = ko \n";
    }
    if($check)
    {
        if((new ReflectionClass('AUnit'))->isAbstract())
        {
        echo "test 4 = ok \n";
        }
        else
        {
        echo "test 4 = ko \n";
        }
    }
    else
    {
        echo "test 4 = ko \n";
    }
}

checkvalue();

