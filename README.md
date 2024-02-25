
## Acerca de Template Laravel Vue
Template es una plantilla que contiene un administrador con elementos simples como formularios, botones, tablas entre otros para acelerar el desarrollo. Permite tener preparada la gestión de usuarios, perfiles, entre otras cosas.

Este proyecto tiene como núcleo Laravel 10, Intertiajs y Vuejs 3.
## Instalar proyecto
#### Requerimientos
Para instalar este proyecto se requiere tener instalado como mínimo las siguientes dependencias:
- Composer 2.5.7
- Nodejs 18.17.0
- NPM 9.6.7
- La base de datos es a discreción del usuario.
#### Instalación
El proyecto es capas de configurarse a si mismo si todas las dependencias están satisfechas. Para instalar el proyecto corra:
``
composer env:prod
``
o si lo prefiere:
``
composer env:dev
``
Se instalara el ambiente de producción o desarrollo respectivamente.

Una vez configurado el archivo .env con la base de datos, puede sembrar la base de datos:
``
composer db:prod
``
o si desea instalarla con el modo desarrollo:
``
composer db:dev
``

#### Notificaciones en tiempo real
Si se desea aprovechar el servicio de notificaciones en tiempo real integrado, se requiere instalar SOKETI y PM2.
``
npm install -g @soketi/soketi
``
``
npm install -g pm2
``
También puede ejecutar el instalador integrado:
``
php artisan composer notification:install
``
En caso de error, procure usar privilegios de super usuario.

Para iniciar el servicio debe iniciarlo con el comando:
``
php artisan notification:start
``
O si desea detenerlo:
``
php artisan notification:stop
``
En caso de una desactivación permanente, puede eliminar la instancia:
``
php artisan notification:destroy
``

Puede configurar libremente el servidor de notificaciones como usted desee con el archivo ``soketi.json``. Entre los parámetros editables están:
- Puerto
- ID de la instancia
- KEY de la instancia
- SECRETE de la instancia

El archivo de configuración se crea automáticamente al instalar el proyecto. Recuerde colocar los datos que edite de ``soketi.json`` en la configuración de PUSHER en el ``.env``.

El nombre de la instancia del servicio de notificaciones dentro de PM2 sera el mismo que se establezca en PUSHER_APP_KEY dentro del ``.env``. Es posible que sea conveniente modificar este dato si desea correr dos o más instancias de la aplicación dentro del mismo servidor para evitar que las notificaciones se compartan entre instancias. En caso contrario no es necesario modificar nada.

La aplicación puede funcionar bien con el establecimiento de un proxy inverso mediante NGINX si se requiere establecer un subdominio o dominio como puerta de enlace al servidor de notificaciones.

Por default las notificaciones están desactivadas. Se activan cambiando la variable de entorno ``PUSHER_NOTIFICATIONS`` de ``false`` a ``true``.
## Autor
Este proyecto fue desarrollado por Moisés de Jesús Cortés Castellanos. Si tiene alguna duda o recomendación, enviar a [ing.moisesdejesuscortesc@notsoweb.com](mailto:ing.moisesdejesuscortesc@notsoweb.com).
