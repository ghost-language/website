#!/bin/bash

if [ -d "resources/blog" ]; then
    echo "Pulling latest blog posts..."
    (cd resources/blog && git pull)
else
    echo "Cloning blog..."
    git clone --single-branch --branch "nightly" git@github.com:ghost-language/blog.git "resources/blog"
fi;