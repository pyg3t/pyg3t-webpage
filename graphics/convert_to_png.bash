#!/bin/bash

for file in *.svg;do
    target=`basename $file svg`"png"
    echo $target
done