CREATE DATABASE Practica1_TS1;

use Practica1_TS1;

CREATE TABLE permisos (
  `id` int(11) NOT NULL PRIMARY KEY,
  `rol` varchar(50) NOT NULL
);

INSERT INTO permisos (id, rol) VALUES
(1, 'Profesor'),
(2, 'Estudiante');

CREATE TABLE user (
  id int(11) NOT NULL,
  carnet varchar(9) NOT NULL PRIMARY KEY,
  nombre varchar(50) NOT NULL,
  correo varchar(50) NOT NULL,
  telefono varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  fecha timestamp NOT NULL DEFAULT current_timestamp ON UPDATE current_timestamp,
  rol int(11) NOT NULL ,
  FOREIGN KEY (rol) REFERENCES permisos(id)
);

INSERT INTO `user` (`id`,`carnet`, `nombre`, `correo`, `telefono`, `password`, `fecha`, `rol`) VALUES
(3, '201434597', 'Maria', 'user@gmail.com', '9900258789', '12345', '2023-07-11 18:30:47', 2),
(4, '201334596', 'Emanuel', 'usuario@gmail.com.mx', '9911165670', '12345', '2023-07-13 19:10:54', 1),
(7, '201834196', 'Jose', 'jt615257@gmail.com', '9981298737', '12345', '2023-07-11 18:31:03', 2),
(10,'201134996', 'Shaggy', 'Shaggy@Buu.net', '54948151', '12345', '2023-07-13 19:09:56', 1),
(11,'202034596', 'Scrapy', 'sam@gmail.com', '9975201478', '12345', '2023-7-13 18:31:27', 2);

ALTER TABLE `user`
  ADD KEY `permisos` (`rol`);

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;


