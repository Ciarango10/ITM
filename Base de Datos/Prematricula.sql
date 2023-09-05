CREATE DATABASE Prematricula
GO
USE Prematricula
GO
CREATE TABLE Alumno
(
	IdAlumno bigint identity(1,1),
	Documento bigint not null,
	Nombre varchar(50),
	Apellido varchar(50),
	Ciudad varchar(150) default ('Medellin'),
	FechaNacimiento Date,
	Edad int
)