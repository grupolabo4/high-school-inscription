# High School Inscription

## Proyecto para laboratorio de computacion 4

### Pasos para levantar el proyecto localmente:

1. Instalar docker (https://docs.docker.com/engine/install/)
2. En algunos SO la instalación de docker no incluye docker-compose, por lo que se debe instalar manualmente (https://docs.docker.com/compose/install)
3. En la carpeta raiz del proyecto ejecutar el comando `docker-compose up` para hacer el build de las imágenes y levantar los contenedores (Esto va a dejarnos el apache corriendo en el puerto 80 de nuestra máquina y MYSQL en el puerto 3306, al mismo tiempo que podemos ver los logs en consola). Si lo corremos con el flag `-d` lo levantamos en modo deamon por lo que no vamos a quedar attacheados a la consola ni ver los logs.

### Datos para trabajar en el entorno local:

- Para poder ver los logs debemos ejecutar `docker-compose logs -f web` donde "web" es el nombre de nuestro servicio docker (En este proyecto puede ser "web" o "db")
- Para parar los contenedores ejecutar `docker-compose down`
- Para recrear las imágenes ejecutar `docker-compose build`

### Datos para conectarse a la base de datos local:

- Database: labo4
- User: root
- Password: test
- Endpoint: localhost:3306