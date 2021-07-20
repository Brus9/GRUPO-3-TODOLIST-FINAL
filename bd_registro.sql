drop database  bd_registro;
create database bd_registro;
use bd_registro;

create table usuarios(
id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
usuario varchar(50),
correo varchar (50),
contraseña blob (30));

create table tareas(
id_tareas INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nomtarea varchar (30),
id_usuario  int,
foreign key (id_usuario) references usuarios(id_usuario));
-------------------------------------------------------------------
INSERT INTO usuarios VALUES('01','brus','brus@gmail.com','123b');
INSERT INTO usuarios VALUES('02','oscar','oscar@gmail.com','123o');

INSERT INTO tareas VALUES('01','dormir','01');
INSERT INTO tareas VALUES('02','trabajar','01');
INSERT INTO tareas VALUES('03','correr','02');
INSERT INTO tareas VALUES('04','dormir','02');
-----------------------------------------------------------------------
-- PROCEDIMIENTO ALAMCENADO AGRGAR TAREA--
DROP PROCEDURE IF EXISTS sp_insertar_tareas;
	CREATE PROCEDURE sp_insertar_tareas(
						nom VARCHAR (30),
                        id_usuario int)
INSERT INTO tareas VALUES(nom, id_usuario);

-----------------------------------------------------------------------
select * from usuarios;
select * from tareas;

-----------------------------------------------------------------------
SELECT id_usuario, usuario, correo FROM usuarios WHERE correo = 'brus@gmail.com';
SELECT nomtarea FROM tareas WHERE correo = 'brus@gmail.com';
-----------------------------------------------------------------------
SELECT U.id_usuario, U.usuario, T.id_tareas, T.nomtarea
FROM usuarios U INNER JOIN tareas T ON U.id_usuario = T.id_usuario 
WHERE correo = 'brus@gmail.com';
-----------------------------------------------------------------------
SELECT id_usuario FROM usuarios  
WHERE correo = 'brus@gmail.com';
