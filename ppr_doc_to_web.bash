#!/bin/bash

# Directories
builddir=$HOME/code/pyg3t-ppr-webpage/ppr_documentation
docdir=$HOME/code/poproofread/poproofread/doc/C

# Make sure we are in the right dir
cd $builddir
if [ $? -gt 0 ];then
    echo "Could not cd to $docdir \nExiting..!"
    exit 1
fi

if [ `pwd` != $builddir ];then
    echo "Could not cd to $builddir \nExiting..!"
    exit 1
fi

echo "### Removing old files:"
rm -r $builddir/fig $builddir/html $builddir/index.cache

echo "### Copying new content:"
cp -r $docdir/* $builddir

echo "### Build cache:"
yelp-build cache *.page

echo "### Make html dir and convert content to html:"
mkdir html
yelp-build html -o html *.page
