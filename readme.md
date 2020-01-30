# MovieMax App

Aplicacion web para administrar inventario de peliculas de MovieMax.

#### Instrucciones para instalacion

1. clonamos el proyecto en el servidor a usar usando: 
`git clone https://github.com/KiritoXD01/moviemax.git`

2. editamos en archivo `.env` con los datos de conexion a la base de datos, en caso de usar `php artisan serve` para pruebas, se debe colocar `http://localhost:"el puerto a usar"` o el dominio si se usara laradock en entornos Linux. De no hacer este paso, las imagenes no podran visualizarse.

3. luego de que ya estan los datos correctos, abrimos la consola en el 
directorio raiz del proyecto y corremos los siguientes comando en el orden
mostrado:

- `composer install`
- `php artisan migrate`
- `php artisan storage:link`
- `php artisan passport:install`