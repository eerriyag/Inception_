#!/bin/sh
set -eu

cd /var/www/html

ap=$(cat /run/secrets/wp_admin_password)
up=$(cat /run/secrets/wp_user_password)
dp=$(cat /run/secrets/db_password)

until mariadb -h mariadb --port=3306 -u"$MYSQL_USER" -p"$dp" "$MYSQL_DATABASE" \
    -e "SELECT 1" >/dev/null 2>&1; do
    echo "watting for mariadb"
    sleep 1
done

if [ ! -f wp-config.php ]; then
    wp core download --allow-root
    wp config create --dbname="$MYSQL_DATABASE" --dbuser="$MYSQL_USER" \
        --dbpass="$dp" --dbhost="$DB_HOST" --allow-root

    wp core install --url="https://$DOMAIN_NAME" --title="Inception" \
        --admin_user="$WP_ADMIN_USER" --admin_password="$ap" \
        --admin_email="$WP_ADMIN_EMAIL" --allow-root
   
    wp user create "$WP_USER" "$WP_USER_EMAIL" \
        --role=author --user_pass="$up" --allow-root
fi

exec php-fpm8.2 -F

