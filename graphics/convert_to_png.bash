#!/bin/bash

for file in *.svg;do
    target=`basename $file svg`"png"
    inkscape $file --export-png $target
    if [ $? -eq 0 ];then
	echo "Converted $file to $target"
    fi
done