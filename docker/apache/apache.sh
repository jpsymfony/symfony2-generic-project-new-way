#!/bin/bash

chown -R www-data:www-data /var/www/mes_projets_symfony/alterway-demo/app/cache
chown -R www-data:www-data /var/www/mes_projets_symfony/alterway-demo/app/logs

source /etc/apache2/envvars
rm /var/run/apache2/apache2.pid
tail -f /var/log/apache2/error.log &
exec apache2 -D FOREGROUND