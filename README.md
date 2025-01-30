# CRUD de Alojamientos en PHP

Este proyecto es una aplicación básica para la gestión de alojamientos. Permite realizar operaciones CRUD utilizando PHP puro y base de datos MySQL.


## Authors

- Gabriela Canales [@gabymcanales](https://github.com/gabymcanales)

- Eleazar Rivas [@el3azar](https://github.com/el3azar)


## Documentation



CARACTERISTICAS 

- Crear: Añadir nuevos alojamientos con información como nombre, descripción, precio y ubicación.

- Leer: Mostrar una lista completa de alojamientos almacenados en la base de datos.

- Actualizar: Modificar los detalles de un alojamiento existente.

- Eliminar: Borrar alojamientos de la base de datos.

- Validación: Validaciones básicas en formularios para garantizar entradas válidas.


REQUISITOS PREVIOS

- Servidor Web: Apache, Nginx u otro compatible con PHP.

- PHP: Versión 7.4 o superior.

- Base de Datos: MySQL 

- Extensión PDO: Habilitada en el servidor PHP.

- Navegador Web: Para probar la aplicación.

INSTALACIÓN

1. Clona este repositorio en tu entorno local:

        git clone https://github.com/tuusuario/crud-alojamientos.git

2. Configura la base de datos MySQL:

- Crea una base de datos llamada alojamientos (o el nombre que prefieras)

        CREATE DATABASE alojamientos;

- Importa el archivo database.sql incluido en el proyecto para crear las tablas necesarias:

        mysql -u tu_usuario -p alojamientos < database.sql

3. Configura la conexión a la base de datos:


- Edita la clase Connection.php y ajusta las credenciales de tu base de datos


4. Inicia el servidor web 
- asegúrate de que tu servidor (Apache/Nginx) esté apuntando al directorio del proyecto.

5. Accede a la aplicación 
- Abre tu navegador y navega a: http://localhost:#### (segun la URL configurada).


USO

- Crear un nuevo alojamiento: Haz clic en el botón "Agregar Alojamiento" y completa el formulario.

- Ver la lista de alojamientos: En la página principal (index.php), se muestra la lista de alojamientos.

- Actualizar un alojamiento: Haz clic en el botón "Editar" junto al alojamiento que deseas modificar.

- Eliminar un alojamiento: Haz clic en el botón "Eliminar" para borrar un alojamiento de la base de datos.
