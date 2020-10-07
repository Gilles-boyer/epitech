<?php

require_once("character.class.php");

foreach ([new  Character , new  Character("Julien"), new  Character] as  $character)
{echo  $character;}