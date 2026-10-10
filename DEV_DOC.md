# Developer Documentation

## Prerequisites

- A Linux virtual machine with Docker Engine, the Docker Compose plugin, and GNU Make.
- A hostname entry mapping `eerriyag.42.fr` to the virtual machine's IP address.

## Fresh Setup

1. Create the persistent-data directories: `/home/eerriyag/data/mariadb` and `/home/eerriyag/data/wordpress`.
2. Create these local files in `secrets/`: `db_root_password.txt`, `db_password.txt`, `wp_admin_password.txt`, and `wp_user_password.txt`. Put one password in each file and keep the files private. The directory is ignored by Git.
3. Check `srcs/.env` for the domain and account names. Do not put passwords in this file.
4. Run `make` from the repository root. The Makefile builds and starts MariaDB, WordPress, and NGINX.

## Service Management

- `make` builds and starts the stack.
- `make build` builds the three service images.
- `make up` starts the services.
- `make down` stops and removes the containers and network without requesting volume removal.
- `docker compose -f srcs/docker-compose.yaml ps` shows service status.
- `docker compose -f srcs/docker-compose.yaml logs -f` follows service logs.

`make fclean` removes Compose volumes as well as images and containers. Back up the persistent data before using it.

## Configuration and Persistence

Compose configuration is in `srcs/docker-compose.yaml`; non-secret variables are in `srcs/.env`. Each service has a Dockerfile in its corresponding `srcs` directory. Local Docker secrets are mounted from `secrets/` at runtime.

The named volume `mariadb_data` stores database files at `/home/eerriyag/data/mariadb`. The named volume `wordpress_data` stores site files at `/home/eerriyag/data/wordpress`. Both are configured with the local volume driver and host paths. Removing or rebuilding containers does not remove these host directories.
