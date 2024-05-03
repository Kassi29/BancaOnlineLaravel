
# Pregunta 1

## Introducción
Este proyecto de Banca Online está desarrollado utilizando el framework Laravel. Proporciona una aplicación web para gestionar personas, cuentas bancarias y transacciones.

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

## Ejecución del servidor
Para ejecutar el servidor y visualizar la aplicación en el navegador, puedes ejecutar el siguiente comando en tu terminal:
```bash
php artisan serve --port=8000  
```

¡Listo! Ahora puedes acceder a la aplicación de Banca Online en tu navegador visitando la URL `http://localhost:8000`.
