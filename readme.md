# MovieMax App

Aplicacion web para administrar inventario de peliculas de MovieMax.

#### Instrucciones para instalacion

1. clonamos el proyecto en el servidor a usar usando: 
`git clone https://github.com/KiritoXD01/moviemax.git`

2. editamos en archivo `.env` con los datos de conexion a la base de datos,
el dominio del proyecto y habilitando el modo produccion.

3. luego de que ya estan los datos correctos, abrimos la consola en el 
directorio raiz del proyecto y corremos los siguientes comando en el orden
mostrado:

- `composer install`
- `php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="migrations"`
- `php artisan migrate`
- `php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="config"`
- `php artisan storage:link`
- `php artisan passport:install`