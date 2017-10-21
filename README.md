/etc/apache2/sites-available/api-proveedores.com


    <VirtualHost *:80>
        ServerAdmin webmaster@localhost
        ServerName api-proveedores.com
        ServerAlias www.api-proveedores.com
        DocumentRoot /var/www/html/api-proveedores.com

        <Directory /var/www/html/api-proveedores.com/>
            Options Indexes FollowSymLinks
            AllowOverride All
            Require all granted
        </Directory>
    </VirtualHost>


Ejecutar los comandos:

    a2enmod rewrite

    a2disite 000-default.conf

    a2ensite api-proveedores.com.conf

Agregar en hosts:

/etc/hosts

    127.0.0.1 api-proveedores.com