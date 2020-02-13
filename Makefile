composer-install:
	docker-compose exec app composer install --prefer-dist --no-interaction
migrate:
	docker-compose exec app php bin/console doctrine:migrations:migrate --no-interaction
diff:
	docker-compose exec app php bin/console doctrine:migrations:diff --no-interaction
create-db:
	docker-compose exec app php bin/console doctrine:database:create --no-interaction
yarn:
	docker-compose exec app yarn install
encore:
	docker-compose exec app yarn encore dev
cc:
	docker-compose exec app php bin/console cache:clear
fixt:
	docker-compose exec app php bin/console doctrine:fixtures:load --no-interaction
csfix:
	phpcbf --ignore=src/Migrations/**,src/Kernel.php
cscheck:
	phpcs --ignore=src/Migrations/**,src/Kernel.php
#no docker
start:
	php -S localhost:8000 -t public/