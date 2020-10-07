<?php

/*@par : take var type ('string') for hash password to md5 format
  @return : string password to md5
*/
function my_very_secure_hash($password)
{
    return crypt($password, '$1$abcdefgh$');
}
