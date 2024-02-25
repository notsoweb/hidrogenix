#!/bin/bash
read -p "Usuario del sistema: " myuser

chown -R $myuser:www-data storage/
chown -R $myuser:www-data bootstrap/cache/
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/