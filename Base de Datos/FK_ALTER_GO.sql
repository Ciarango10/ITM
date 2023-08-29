CREATE database Universidad
--mdf
on primary 
(Name = Universidaddata, filename='D:\Data\Universidad.mdf',
size=50mb,
Filegrowth = 25%)
--log
log on 
(Name = UniversidadLog, filename='D:\Data\Universidad.ldf',
size=25mb,
Filegrowth = 25%);
GO
USE Universidad
GO
CREATE TABLE Alumno(
Id int identity(1,1),
IdAlumno int primary key,
NombreAlumno varchar(50) not null,
ApellidoAlumno varchar(50) not null,
Direccion varchar(50) not null,
Fecha_nacimiento date
);
GO
CREATE TABLE Asignatura(
Id int identity (1,1),
IdAsignatura int primary key,
NombreAsignatura varchar(50) not null,
Creditos int not null
);
GO
CREATE TABLE Profesor(
Id int identity (1,1),
IdProfesor int primary key,
NombreProfesor varchar(50) not null,
ApellidoProfesor varchar(50) not null,
Direccion varchar(50),
Fecha_nacimiento date,
Nivel_Academico int not null
);
GO
CREATE TABLE Matricula(
IdMatricula int primary key identity(1,1),
IdAsignatura int not null,
IdAlumno int not null,
IdProfesor int not null,
Fecha date,
Constraint fk_Alumno FOREIGN KEY(IdAlumno) REFERENCES Alumno(IdAlumno),
Constraint fk_Asignatura FOREIGN KEY(IdAsignatura) REFERENCES Asignatura(IdAsignatura),
)
GO
ALTER TABLE Matricula
ADD FOREIGN KEY (IdProfesor) REFERENCES Profesor(IdProfesor)

