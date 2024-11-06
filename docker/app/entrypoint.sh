ROOT_DIR=/var/www/
cd $ROOT_DIR # Меняем рабочую директорию
whoami

# Установка пакетов Composer
/usr/local/bin/composer install
/usr/local/bin/composer dump-autoload
php artisan migrate
php artisan config:cache
# Местоположение php-fpm
PHP_FPM=$(which php-fpm)
# Создаем новый процесс php-fpm
$PHP_FPM
echo "PHP_FPM Подключен"
