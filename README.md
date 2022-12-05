# crear tabla modelo migracion controlador recurso seeder factory
php artisan make:model  NombreModelo -mcrsf
# crear migracion
php artisan make:request NombreRequest|
# instalar la libreria para JWT
composer require firebase/php-jwt
# borrar todo y volver a llenar
php artisan migrate:fresh --seed

# crear el midleware
php artisan make:middleware JWTMiddleware
# en el kernel.php agregar el midleware
'jwt.verify' => \App\Http\Middleware\JWTMiddleware::class,