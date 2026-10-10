# User Documentation

## Services

- NGINX serves the site over HTTPS on port 443.
- WordPress runs through PHP-FPM and provides the website and administration panel.
- MariaDB stores WordPress data.

## Start and Stop

From the repository root, run `make` to build and start the services. Run `make down` to stop them without removing persistent data.

## Access

Open `https://eerriyag.42.fr`. The hostname must resolve to the virtual machine's IP address. The included TLS certificate is self-signed and may trigger a browser warning.

Open `https://eerriyag.42.fr/wp-admin` to administer WordPress. The administrator username is configured in `srcs/.env`; its password is stored locally in `secrets/wp_admin_password.txt`. The regular account password is in `secrets/wp_user_password.txt`.

## Check Services

Run `docker compose -f srcs/docker-compose.yaml ps` to inspect container status. Use `docker compose -f srcs/docker-compose.yaml logs` to review service logs. A successful HTTPS request can be checked with `curl -k -I https://eerriyag.42.fr`.
