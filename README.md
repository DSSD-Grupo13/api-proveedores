# API de Proveedores

Esta API consiste en un webservice REST que brinda un servicio de solicitud de presupuestos

Esta implementado utilizando las tecnologias PHP, Apache y el framework Slim

Existe un único metodo, el cual recibe una lista de productos y devuelve un presupuesto

Se debe enviar una solicitud `HTTP POST` a la URL `/solicitar-presupuesto`. La solicitud debe incluir en el `body` un array de objetos en formato `JSON`, por ejemplo:

```JSON
{
	"objetos":
	[
	    {
	      "nombre": "puerta",
	      "cantidad": 1,
	      "descripcion": "puerta"
	    },
	    {
	      "nombre": "parabrisas",
	      "cantidad": 2,
	      "descripcion": "parabrisas"
	    }
	]
}
```

Esto da como resultado un nuevo array con los productos, para los cuales se incluye ademas un campo de precio:

```JSON
{
    "objetos": [
        {
            "nombre": "puerta",
            "cantidad": 1,
            "descripcion": "la fue abollada por el granizo",
            "precio": 1871.19,
            "total": 1871.19
        },
        {
            "nombre": "parabrisas",
            "cantidad": 2,
            "descripcion": "el vidrio fue estallado por el granizo",
            "precio": 2515.08,
            "total": 5030.16
        }
    ],
    "total_final": 6901.35
}
```

# Instalación

1. Se agrega un <Virtual-Host> al servidor de Apache2, en este ejemplo la API se registra en el dominio `api-proveedores.com`

Crear el archivo `/etc/apache2/sites-available/api-proveedores.com.conf` con el contenido:

```xml
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    Servernombre api-proveedores.com
    ServerAlias www.api-proveedores.com
    DocumentRoot /var/www/html/api-proveedores.com

    <Directory /var/www/html/api-proveedores.com/>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
  </VirtualHost>
```

`Nota: El directorio /var/www/html/api-proveedores.com debe existir`

2. Ejecutar los comandos en una terminal:

```
a2enmod rewrite

a2dissite 000-default.conf

a2ensite api-proveedores.com
```

3. Agregar en hosts: `/etc/hosts`

```
127.0.0.1 api-proveedores.com
```
4. Luego reiniciar el servicio de Apache

 ```
   systemctl restart apache2
```
