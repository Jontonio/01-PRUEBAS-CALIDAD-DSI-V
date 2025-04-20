# Simple Create, Read, Update, Delete (CRUD) con PHP & MySQL

Ejemplo básico de un CRUD para el curso de prueba y calidad del software - V.

Simple application with: Very simple add, edit, delete, view in PHP & MySQL

El script SQL para crear la base de datos y las tablas está presente en el archivo **database.sql**.


### Explicación:
- **Abrir XAMPP**: Ejecutar el siguiente código para crear la bases de datos.
  
### Código SQL:
```sql
create database pruebaCalidad;

use pruebaCalidad;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;
