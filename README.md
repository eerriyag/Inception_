*This project has been created as part of the 42 curriculum by eerriyag.*

# Inception

## Description

Inception builds a small WordPress infrastructure with Docker Compose. NGINX terminates HTTPS, WordPress runs with PHP-FPM, and MariaDB stores the site database. Each service has its own Debian 12 image and container. The containers communicate on a private Docker bridge network, and named volumes preserve the database and website files under `/home/eerriyag/data`.

## Project Description

Docker packages each service and its runtime dependencies into an isolated container. The Compose file builds the service images from the Dockerfiles in `srcs/`; it does not use ready-made application images. NGINX is the only published service and accepts TLS on port 443.

- Virtual machines provide a full guest operating system; Docker containers share the host kernel and isolate processes, which uses fewer resources for this service stack.
- Docker secrets keep passwords out of the Compose environment and image definitions. Environment variables in `srcs/.env` hold non-secret configuration such as the domain and account names.
- The Docker bridge network allows service-name communication between containers without exposing MariaDB or PHP-FPM to the host network.
- Named Docker volumes persist MariaDB and WordPress data outside the container lifecycle. Their local driver options place the data in `/home/eerriyag/data/mariadb` and `/home/eerriyag/data/wordpress` on the host.

## Instructions

Create the four local secret files listed in `DEV_DOC.md`, then run `make` from the repository root. The site is available at `https://eerriyag.42.fr`; configure that hostname to resolve to the virtual machine's IP address. The TLS certificate is self-signed, so a browser warning is expected.

Use `make down` to stop the stack. See [USER_DOC.md](USER_DOC.md) for access and runtime checks, and [DEV_DOC.md](DEV_DOC.md) for a fresh setup and Docker commands.

## Resources

- [Docker documentation](https://docs.docker.com/)
- [Docker Compose documentation](https://docs.docker.com/compose/)
- [MariaDB documentation](https://mariadb.com/kb/en/documentation/)
- [WordPress documentation](https://wordpress.org/documentation/)
- [NGINX documentation](https://nginx.org/en/docs/)
- [PHP-FPM documentation](https://www.php.net/manual/en/install.fpm.php)

AI assistance was used to review configuration and troubleshoot service startup. The tested with Compose, service logs, WordPress database checks, and HTTPS requests.
