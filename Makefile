.PHONY: up down build

up:
	docker-compose config -q && \
	docker-compose up -d --force-recreate

down:
	docker-compose config -q && \
	docker-compose down --remove-orphans

reboot:
	make down && make up

build:
	docker-compose config -q && \
	docker-compose build --pull

rebuild:
	make down && make build && make up

migrate:
	docker-compose config -q && \
	docker-compose exec laravel php artisan migrate

seed:
	docker-compose config -q && \
	docker-compose exec laravel php artisan db:seed

composer-install:
	docker-compose config -q && \
	docker-compose exec laravel composer install

composer-update:
	docker-compose config -q && \
	docker-compose exec laravel composer update

npm-install:
	docker-compose config -q && \
	docker-compose run --rm node bash -c "npm install -g npm@latest && npm i && npm audit fix || true"

webpack:
	docker-compose config -q && \
	docker-compose run --rm node npm run dev

npm-watch:
	docker-compose config -q && \
	docker-compose run --rm node npm run watch

clearcache:
	docker-compose exec laravel php artisan cache:clear; \
	docker-compose exec laravel php artisan clear-compiled; \
	docker-compose exec laravel php artisan config:clear; \
	docker-compose exec laravel php artisan route:clear; \
	docker-compose exec laravel php artisan view:clear; \
	docker-compose exec laravel php artisan optimize; \
	true

pint:
	docker compose config -q && \
	docker compose exec laravel sh pint.sh

phpstan:
	docker compose config -q && \
	docker compose exec laravel sh phpstan.sh

phpstan-output:
	docker compose config -q && \
	docker compose exec laravel sh phpstan.sh -gbf -gbe

generate:
	docker compose exec laravel php artisan ide-helper:generate && \
	docker compose exec laravel php artisan ide-helper:meta && \
	docker compose exec laravel php artisan ide-helper:models -M
