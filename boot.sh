#!/bin/bash

cd /var/www
composer install

FILE=/var/www/appserver/appserver
if [ ! -f "$FILE" ]; then
    go mod init github.com/pepe_botika69/rr-appserver
    cp /var/www/appserver/main.go.example /var/www/appserver/main.go
fi
pwd
./appserver/appserver serve -v -d

