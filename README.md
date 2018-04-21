# Pruebas

Esta página sirve para obtener datos claves de los clientes usando unicamente la informacion básica, asi como generar reportes de la informacion guardada únicamente a las personas que cuenten con credenciales de acceso.

## Antes de Empezar

Estas instrucciones te daran una copia de este proyecto para que sea utilizado en tu maquina local con propositos de pruebas y desarrollo.

### Prerequisitos

Lo que necesitas para utilizar este proyecto es tener instalado el siguiente software en tu computadora:

```
XAMPP v3.2.2 ó en su defecto instalar los servicios de apache, mysql que cuenten con la version de php 7.0 o superior

```

### Instalacion

Descargar el proyecto con el boton de clone or download

Descomprimir el archivo en la carpeta raiz de su servidor

```
En XAMPP la ruta es c:xampp/htdocs
```

Abrir MySql e importar la base de datos prueba incluida en el archivo.

Configurar los siguientes archivos de conexion:

```
c:xampp/htdocs/php/conexion.php

c:xampp/htdocs/php/config.php
```

con los siguientes datos:

```
$user="root"; //usuario para ingresar a la base de datos
$pass=""; //contraseña del usuario
$host="localhost"; //nombre del host o dominio en el que se encuentra la base de datos, por defecto es localhost o 127.0.0.1
$db="prueba"; //nombre de la base de datos

```

Por ultimo y una vez iniciado los dervicios de apache y mysql, en la barra de direcciones del navegador web escribimos lo siguiente:

```
http://localhost

ó

http://127.0.0.1
```

Te llevara a la pagina principal del proyecto

## Pruebas del sistema

Una vez en la pagina principal del sistema veremos un formulario el cual tendremos que llenar con nuestros datos.

Los campos deben ser llenados de manera consecutiva con la informacion solicitada, de esta manera al seleccionar el sexo se generara automaticamente el rfc y el curp. Y al escribir el codigo postal nos dara automaticamente el estado, municipio y desplegara una lista con las colonias que se encuentran adscritas a es cp.

Una vez que todos los campos se encuentran con su respectiva información damos click en el boton guardar, el cual desplegara un mensaje indicando que los datos se enviaron correctamente o un mensaje de error en caso contrario.

De vuelta en la pagina principal en la parte inferior derecha se encuentra un boton para exportar el reporte de las personas que han enviado sus datos a traves del formulario. Para descargar este reporte debes ingresar con tu cuenta de google lo cual te permitira descargar la informacion en formato .xls


## Construido con

* [Bootstrap 3.2.0] - El framework css utilizado
* [Jquery 3.3.1] - Libreria js utilizado
* [Sweetalert2] - Libreria css y js para la creacion de alertas
* [PHPExcel] - Libreria php para la creacion de reportes en .xls


## Autor

* **Nestor Garcia** 

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
