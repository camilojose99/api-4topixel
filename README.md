<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Api Laravel para gestión de clientes

Api para gestionar clientes en la cual encontramos las funciones para crear, actualizar, ver y eliminar CRUD.


## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._

### Pre-requisitos 📋

- Composer
- Servidor web (Xampp, Wampp, Mamp) apache

### Instalación 🔧
En caso de estar en un entorno de desarrollo local (localhost), se debe copiar la carpeta del proyecto en la carpeta 'htdocs' o 'www'. 
Agregamos la carpeta del proyecto a nuestro editor de código y creamos el archivo .env copiando y pegando desde el archivo .env.example.
Una vez que tengamos el .env, iniciamos una ventana del terminal desde la raiz del proyecto y ejecutamos los siguientes comandos:
```
composer update
```
```
php artisan key:generate
```
### Base de datos
Creamos una base de datos y colocamos los datos de conexión en el archivo .env con los siguientes datos:
- Nombre db
- Usuario db
- Password db
- Puerto conexión (3306 - 8889)
- Db host (127.0.0.1)

## Migraciones
Ejecutamos el siguiente comando para refrescar la base de datos, crear las tablas necesarias, e insertar algunos datos que serán utilizados.
```
php artisan migrate:refresh --seed
```

## Levantar servidor
Utilizamos el comando **serve** de **Artisan** para crear un servidor de desarrollo en local para la aplicación
```
php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
