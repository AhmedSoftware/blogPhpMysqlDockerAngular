
composer install

php bin/console cache:clear --no-debug --env=prod
php bin/console doctrine:schema:update --force
php bin/console assets:install --no-debug --env=prod