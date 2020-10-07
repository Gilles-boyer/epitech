<?php



class Gecko

{    
    public $name;

    public function Gecko($name = NULL)
    {
        $this ->name = $name;

        if(empty($name))
        {
            echo "Hello !\n";
        }
        else
        {
            echo "Hello $this->name !\n";
        }
    } 
}