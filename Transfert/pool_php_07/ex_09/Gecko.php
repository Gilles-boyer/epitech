<?php

class Gecko
{
    public $friends = [];
    public $skill ;

    function __construct(array $friends = null, object $skill)
    {
        $this->friends = $friends;
        $this->skill = $skill;
    }
}
