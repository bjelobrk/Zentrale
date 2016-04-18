sudo chmod -R 777 app/cache
sudo chmod -R 777 app/logs
php app/console cache:clear --env=dev
php app/console cache:clear --env=prod
sudo chmod -R 777 app/cache
sudo chmod -R 777 app/logs
