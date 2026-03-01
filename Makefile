NAME = inception

COMPOSE = docker compose -f srcs/docker-compose.yml --env-file srcs/.env

all: up

up:
	$(COMPOSE) up -d --build

down:
	$(COMPOSE) down

stop:
	$(COMPOSE) stop

start:
	$(COMPOSE) start

clean: down
	docker system prune -af

fclean: clean
	docker volume rm mariadb_data wordpress_data 2>/dev/null || true

re: fclean all
