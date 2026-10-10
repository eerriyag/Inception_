.PHONY: all build prepare up down logs clean fclean re

COMPOSE = docker compose -f srcs/docker-compose.yaml
DATA_DIR = /home/eerriyag/data

all: up

build:
	$(COMPOSE) build mariadb
	$(COMPOSE) build wordpress
	$(COMPOSE) build nginx

prepare:
	mkdir -p $(DATA_DIR)/mariadb $(DATA_DIR)/wordpress

up: prepare build
	$(COMPOSE) up -d mariadb
	$(COMPOSE) up -d wordpress
	$(COMPOSE) up -d nginx

down:
	$(COMPOSE) down

logs:
	$(COMPOSE) logs -f

clean:
	$(COMPOSE) down

fclean:
	sudo  rm -rf $(DATA_DIR)
	$(COMPOSE) down --rmi all --volumes
	

re: fclean build up
