#!/bin/bash

cd /var/www
composer install

FILE=/var/www/appserver/appserver
if [ ! -f "$FILE" ]; then
    cd appserver
    go mod init github.com/pepe_botika69/rr-appserver
    cp /var/www/appserver/main.go.example /var/www/appserver/main.go
    go build -o appserver
    cd ..
fi

./appserver/appserver serve -v -d

