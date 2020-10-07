<?php

/*function for to remove cookie
take a parameter the name of cookie
$value = string and the name of cookie
*/

function remove_cookie($value)
{
  setcookie($value,"", -3600);
}
