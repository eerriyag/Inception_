FROM debian:12

RUN apt-get update && apt-get install -y \
    php8.2-fpm php8.2-mysql mariadb-client curl && \
    curl https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    -o /usr/local/bin/wp && \
    chmod +x /usr/local/bin/wp && \
    sed -i 's|listen = .*|listen = 9000|' /etc/php/8.2/fpm/pool.d/www.conf


COPY tools/entrypoint.sh /wordpress-init.sh
RUN chmod +x /wordpress-init.sh

ENTRYPOINT ["/wordpress-init.sh"]
