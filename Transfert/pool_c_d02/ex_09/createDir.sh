#!/bin/bash

number=1
while [ $number -le $1 ]
do
    if [ $number -lt 10 ]
    then
	mkdir -p "ex_0"$number
    else
	mkdir -p "ex_"$number
    fi
    ((number++))
done
