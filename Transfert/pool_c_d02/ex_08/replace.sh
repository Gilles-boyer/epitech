#!/bin/bash

#create var
var=$(cat $1 | sed  s/$2/$3/g)

#write in $1
echo $var >$1






