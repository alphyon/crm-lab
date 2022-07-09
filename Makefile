.RECIPEPREFIX +=
.DEFAULT_GOAL := help

help:
	@echo "Useful  commands"
install:
	@composer install
test:
	docker exec crm_php php artisan test
migrate:
	docker exec crm_php php artisan migrate
analyse:
	./vendor/bin/phpstan analyse
generate:
	docker exec crm_php php artisan ide-helper:models --write
nginx:
	docker exec -it crm_nginx /bin/sh
php:
	docker exec -it crm_php /bin/sh
redis:
	docker exec -it crm_redis /bin/sh

