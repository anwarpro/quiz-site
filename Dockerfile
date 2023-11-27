FROM docker.io/bitnami/laravel:7
COPY . .
RUN composer install
CMD php artisan serve
EXPOSE 8000