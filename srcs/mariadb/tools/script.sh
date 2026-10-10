#!/bin/sh
set -eu

mkdir -p /var/lib/mysql
chown mysql:mysql /var/lib/mysql 

root_pwd=$(cat /run/secrets/db_root_password)
db_pwd=$(cat /run/secrets/db_password)

mysqld_safe --skip-networking &

until mysqladmin ping --silent ; do
	echo " Waiting for  MariaDB ...."
	sleep 1
done

msgerror=$(mysqladmin ping -u $MYSQL_USER -p"$db_pwd" 2>&1  1> /dev/null)

if [ "$msgerror" != "" ]; then
    mariadb << SQL
CREATE DATABASE $MYSQL_DATABASE;
CREATE USER '$MYSQL_USER'@'%' IDENTIFIED BY '$db_pwd';
GRANT ALL PRIVILEGES ON $MYSQL_DATABASE.* TO '$MYSQL_USER'@'%';
ALTER USER root@localhost IDENTIFIED BY '$root_pwd';
SQL

fi

mysqladmin -u "root" -p"$root_pwd" shutdown


exec mariadbd --user=mysql --bind-address=0.0.0.0 --port=3306
