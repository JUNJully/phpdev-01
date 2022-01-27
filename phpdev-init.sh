#!/bin/bash
apt install curl git zsh php-fpm nginx mysql-server phpmyadmin memcached redis-server php-redis php-memcashed
wget -O viscode.deb https://az764295.vo.msecnd.net/stable/899d46d82c4c95423fb7e10e68eba52050e30ba3/code_1.63.2-1639562499_amd64.deb 
dpkg -i viscode.deb 