<?php

for($i = 1;$i<=5;$i++)
{
    try
    {   
        call_gecko();
        throw new Exception("");
    }
    catch(Exception $e)
    {
        echo $e->getMessage()."\n";
    }
}




