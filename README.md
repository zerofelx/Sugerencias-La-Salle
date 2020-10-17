# Inicio rápido

Se recomienda tener en cuenta los datos otorgados en "Instalación" y crear un usuario con el rol de Admin

## Instalación

Se recomienda hacer la instalación en localhost (En caso dado de que no sea así se recomienda cambiar los links estáticos que dirigen a http://localhost) con Apache y MySQL como base de datos

#### Acceso a la base de Datos:

En el archivo "db.php" que se encuentra en la carpeta "database" se encuentran las variables que contienen las credenciales de acceso a la base de datos, cambiar según las credenciales de tu base de datos

```php
    $dbhost = "localhost";
    $db = "Nombre de la base de datos";
    $dbuser = "usuario";
    $dbpassword = "contraseña";
```

#### Creación de las tablas:
En el archivo "scheme.sql" encontrarás las tablas que se necesitan para la funcionalidad correcta de la aplicación. Se recomienda que todas estén correctamente creadas

## Creación de usuario "Admin"
Para crear un usuario administrador se tendrá que ejecutar la siguiente consulta cambiando los datos "Nombre de usuario" y "Contraseña" por sus respectivos valores

```mysql
INSERT INTO usuarios (username, psw, rol, locked) VALUES ("Nombre de usuario", "Contraseña en MD5", "admin", 0);
```
Cabe recalcar que la contraseña deberá primero ser cifrada a MD5 para ponerla en la consulta ya que las verificaciones se hacen en MD5

## Ejemplo de creación del usuario "Admin"

```mysql
INSERT INTO usuarios (username, psw, rol, locked) VALUES ("andrea", "098f6bcd4621d373cade4e832627b4f6", "admin", 0);
```

La contraseña es "test" cifrado en MD5