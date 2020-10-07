#!/bin/bash

if [ "$#" -lt 1 ]; then
    exit
fi

if [ -d "$1" ]; then
    exit
fi

blih -u gecko repository create "$1"
if [ $? -ne 0 ]; then
    exit
fi
blih -u gecko repository setacl "$1" ramassage-tek r
if [ $? -ne 0 ]; then
    exit
fi
blih -u gecko repository setacl "$1" gecko r
if [ $? -ne 0 ]; then
    exit
fi
git clone git@git.epitech.eu:/gecko/"$1"
