# Pregunta 2
Realice un ABC en PHP de las personas y cuentas bancarias, debe incluir la selección de la cuenta que la persona desee.

## Introducción
Este proyecto de Banca Online está desarrollado utilizando el framework Laravel y PHP. Proporciona una aplicación web para gestionar personas, cuentas bancarias y transacciones. Además, cumple con los requisitos de un ABC en PHP de las personas y cuentas bancarias, incluyendo la selección de la cuenta que la persona desee.

A continuación se detallan las configuraciones realizadas en el proyecto:

## Creación del proyecto Laravel
Para crear el proyecto Laravel, puedes ejecutar el siguiente comando en tu terminal:
```bash
composer create-project --prefer-dist laravel/laravel proyectos/bancaOnline
```

## Configuración de la base de datos
El proyecto utiliza las siguientes tablas en la base de datos:

### Tabla "persona":
```sql
CREATE TABLE persona (
    idpersona INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    direccion VARCHAR(255),
    telefono VARCHAR(15),
    tipo VARCHAR(15)
);
```

### Tabla "cuenta":
```sql
CREATE TABLE cuenta (
    idcuenta INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(20) NOT NULL,
    saldo DECIMAL(10, 2) NOT NULL,
    fecha_creacion DATE NOT NULL,
    idcliente INT NOT NULL,
    departamento VARCHAR(100), 
    FOREIGN KEY (idcliente) REFERENCES persona(idpersona)
);
```

### Tabla "transaccion":
```sql
CREATE TABLE transaccion (
    idtransaccion INT AUTO_INCREMENT PRIMARY KEY,
    cuenta_origen INT NOT NULL,
    cuenta_destino INT NOT NULL,
    monto DECIMAL(10, 2) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cuenta_origen) REFERENCES cuenta(idcuenta),
    FOREIGN KEY (cuenta_destino) REFERENCES cuenta(idcuenta)
);
```
## Creamos usuario admin:
```sql
CREATE USER 'admin'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
```
## Editar el Archivo .env: 
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bdkass
DB_USERNAME=admin
DB_PASSWORD=123456
```
## Migraciones
Para crear y configurar las migraciones de las tablas en Laravel, puedes ejecutar los siguientes comandos en tu terminal:
```bash
php artisan make:model Persona -m
php artisan make:model Cuenta -m
php artisan make:model Transaccion -m   
```

## Eloquent
Eloquent es el ORM (Object-Relational Mapping) de Laravel. En Eloquent, se definen los modelos correspondientes a las entidades de la base de datos: Persona, Cuenta y Transaccion.

## Controladores y Rutas
En el proyecto, se crean controladores y se configuran las rutas correspondientes para gestionar las operaciones CRUD (Crear, Leer, Actualizar, Eliminar) de las entidades.

## Vistas
Se crean vistas para cada entidad, siguiendo el patrón CRUD. Las vistas se encuentran en la carpeta `resources/views/[entidad]`, donde `[entidad]` representa la entidad que se desea ver.

### Banca Online

Este proyecto de Banca Online proporciona una aplicación web para gestionar personas, cuentas bancarias y transacciones.

---

### Banca Online

Este proyecto de Banca Online está desarrollado utilizando el framework Laravel y PHP. Proporciona una aplicación web para gestionar personas, cuentas bancarias y transacciones. Además, cumple con los requisitos de un ABC en PHP de las personas y cuentas bancarias, incluyendo la selección de la cuenta que la persona desee.

---

## Pasos para Ejecutar el Proyecto

1. **Clonar el Repositorio:** Para comenzar, clona el repositorio de GitHub utilizando el siguiente comando en tu terminal:

    ```bash
    git clone https://github.com/tu-usuario/banca-online.git
    ```

2. **Instalar Dependencias:** Accede al directorio del proyecto y utiliza Composer para instalar las dependencias de Laravel:

    ```bash
    cd banca-online
    composer install
    ```

3. **Configurar el Archivo .env:** Copia el archivo de configuración `.env.example` y renómbralo como `.env`. Luego, genera una nueva clave de aplicación con el comando:

    ```bash
    php artisan key:generate
    ```

4. **Crear la Base de Datos y un usuario:** Utilizando phpMyAdmin , la base de datos se llama bdkass y mas arriba puedes ver lass tablas.
Tambien hay que crear un usuario:
    ```sql
    CREATE USER 'admin'@'localhost' IDENTIFIED BY '123456';
    GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' WITH GRANT OPTION;
    FLUSH PRIVILEGES;
    ```

5. **Actualizar el Archivo .env:** Abre el archivo `.env` y actualiza las siguientes líneas con los detalles de tu base de datos:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=bdkass
    DB_USERNAME=admin
    DB_PASSWORD=123456
    ```

6. **Ejecutar las Migraciones:** Con el fin de crear las tablas necesarias en la base de datos, ejecuta las migraciones de Laravel:

    ```bash
    php artisan migrate
    ```

7. **Ejecutar el Servidor:** Finalmente, inicia el servidor de desarrollo de Laravel con el siguiente comando:

    ```bash
    php artisan serve --port=8000
    ```

8. **Acceder a la Aplicación:** Abre tu navegador web y visita la URL `http://localhost:8000` para acceder a la aplicación de Banca Online.

---

¡Listo! Con estos pasos, podrás clonar el proyecto, instalar las dependencias, configurar la base de datos, ejecutar el servidor y acceder a la aplicación web de Banca Online. Disfruta de tu experiencia bancaria en línea!

**Nota:** Para la gestión de la base de datos, se utilizó phpMyAdmin, que forma parte de XAMPP, una solución de servidor local que incluye Apache, MySQL, PHP y otras herramientas.
