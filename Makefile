.RECIPEPREFIX +=
.DEFAULT_GOAL := help
include .env
help:
	@echo "Useful  commands"
install:
	@composer install
test:
	@docker exec $(PROJECT_NAME)_php php artisan test
migrate:
	@docker exec $(PROJECT_NAME)_php php artisan migrate
migrater:
	@docker exec $(PROJECT_NAME)_php php artisan migrate:fresh
seed:
	@docker exec $(PROJECT_NAME)_php php artisan db:seed
optimize:
	@docker exec $(PROJECT_NAME)_php php artisan optimize
analyse:
	./vendor/bin/phpstan analyse
generate:
	@docker exec $(PROJECT_NAME)_php php artisan ide-helper:models --write
nginx:
	@docker exec -it $(PROJECT_NAME)_nginx /bin/sh
php:
	@docker exec -it $(PROJECT_NAME)_php /bin/sh
redis:
	@docker exec -it $(PROJECT_NAME)_redis /bin/sh

