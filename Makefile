composer-install:
	docker-compose exec app composer install --prefer-dist --no-interaction
migrate:
	docker-compose exec app php bin/console doctrine:migrations:migrate --no-interaction
yarn:
	docker-compose exec app yarn install
encore:
	docker-compose exec app yarn encore dev