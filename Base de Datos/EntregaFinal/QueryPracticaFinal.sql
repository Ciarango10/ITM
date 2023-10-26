-- PRACTICA FINAL DESARROLLO DE BASE DE DATOS
-- CARLOS ARANGO LONDOÑO - JUAN DAVID MACHADO MOSQUERA
-- 4)
CREATE DATABASE EstudioMusical 
ON primary 
(name = estudioMusical, filename = 'D:\Carlos Arango\Codigo\ITM\Base de Datos\EntregaFinal\estudiomusical.mdf', size = 50mb, filegrowth = 25%)
LOG ON 
(name = estudioMusicalLog, filename = 'D:\Carlos Arango\Codigo\ITM\Base de Datos\EntregaFinal\estudiomusical.ldf', size = 25mb, filegrowth = 25%);
GO
USE EstudioMusical;
GO
-- 5) 
CREATE TABLE Genero (
	CodGenero int identity(1,1),
	IdGenero int primary key, 
	Nombre varchar(25),
	Constraint CK_Genero_Nombre CHECK (Nombre NOT LIKE '%[^a-zA-Z ]%')
);
GO 
CREATE TABLE Productor (
	CodProductor int identity(1,1),
	IdProductor int primary key, 
	Nombre varchar(25),
	Contacto varchar(30),
	Constraint CK_Productor_Nombre CHECK (Nombre NOT LIKE '%[^a-zA-Z ]%'),
	Constraint CK_Productor_Contacto CHECK (Contacto IS NOT NULL)
);
GO
CREATE TABLE Compositor (
	CodCompositor int identity(1,1),
	IdCompositor int primary key,
	Nombre varchar(25),
	Contacto varchar(30),
	Constraint CK_Compositor_Nombre CHECK (Nombre NOT LIKE '%[^a-zA-Z ]%'),
	Constraint CK_Compositor_Contacto CHECK (Contacto IS NOT NULL)
);
GO
CREATE TABLE Artista (
	CodArtista int identity(1,1),
	IdArtista int primary key, 
	Nombre varchar(25),
	Contacto varchar(30),
	Constraint CK_Artista_Nombre CHECK (Nombre NOT LIKE '%[^a-zA-Z0-9 ]%'),
	Constraint CK_Artista_Contacto CHECK (Contacto IS NOT NULL)
);
GO
CREATE TABLE Album (
	CodAlbum int identity(1,1),
	IdAlbum int primary key, 
	Titulo varchar(50),
	Lanzamiento date default '2023-01-01',
	Id_Artista int,
	Constraint FKArtista_Album foreign key (Id_Artista) references Artista(IdArtista),
	Constraint CK_Album_Titulo CHECK (Titulo IS NOT NULL)
);
GO
CREATE TABLE Cancion (
	CodCancion int identity(1,1),
	IdCancion int primary key, 
	Titulo varchar(50),
	Milisegundos int,
	Estado tinyint,
	Lanzamiento date default '2023-01-01',
	Id_Compositor int,
	Id_Productor int,
	Id_Album int,
	Id_Genero int,
	Constraint FKCompositor_Cancion foreign key (Id_Compositor) references Compositor(IdCompositor),
	Constraint FKProductor_Cancion foreign key (Id_Productor) references Productor(IdProductor),
	Constraint FKAlbum_Cancion foreign key (Id_Album) references Album(IdAlbum),
	Constraint FKGenero_Cancion foreign key (Id_Genero) references Genero(IdGenero),
	Constraint CK_Cancion_Titulo CHECK (Titulo IS NOT NULL),
	Constraint CK_Cancion_Estado CHECK (Estado IN (0,1))
);
GO
CREATE TABLE CancionXArtista (
	CodCancionXArtista int identity(1,1),
	IdCancionXArtista int primary key,
	Id_Cancion int,
	Id_Artista int,
	Constraint FKCancion_Artista foreign key (Id_Cancion) references Cancion(IdCancion),
	Constraint FKArtista_Cancion foreign key (Id_Artista) references Artista(IdArtista)
);
GO
CREATE TABLE Premios (
	CodPremio int identity(1,1),
	IdPremio int primary key,
	Cantidad int default 0,
	Id_Cancion int,
	Constraint FKCancion_Premios foreign key (Id_Cancion) references Cancion(IdCancion)
);
GO
CREATE TABLE Proyecto (
	CodProyecto int identity(1,1),
	IdProyecto int primary key,
	Titulo varchar(25),
	FechaInicio date default '2023-01-01', 
	FechaFinalizacion date default '2023-01-01',
	Presupuesto int,
	Id_Cancion int,
	Constraint FKCancion_Proyecto foreign key (Id_Cancion) references Cancion(IdCancion),
	Constraint CK_Proyecto_Titulo CHECK (Titulo IS NOT NULL)
);
GO
-- 6) CREAR DIAGRAMA DE BASE DE DATOS EN SQL SERVER.
-- 7)
-- INDICE COLUMNAR
CREATE NONCLUSTERED COLUMNSTORE INDEX CL_TituloIndiceCancion ON Cancion(Titulo);
GO
-- INDICE NO AGRUPADO
CREATE NONCLUSTERED INDEX CL_NombreIndiceGenero ON Genero(Nombre);
GO
-- PARA CREAR EL INDICE AGRUPADO TENEMOS QUE QUITAR LA PRIMARY KEY DE LA TABLA ALBUM, POR LO QUE TENEMOS PRIMERO QUE QUITAR SU REFERENCIA EN LA TABLA CANCION
ALTER TABLE Cancion
DROP CONSTRAINT FKAlbum_Cancion;
GO
ALTER TABLE Album
DROP CONSTRAINT PK__Album__BF9C2A22A359498F;
GO
CREATE CLUSTERED INDEX CL_TituloIndiceAlbum ON Album(Titulo);
GO
-- 8)
INSERT INTO Genero (IdGenero, Nombre) 
VALUES 
(1, 'Salsa'),
(2, 'Bachata'),
(3, 'Merengue'),
(4, 'Reggaeton'),
(5, 'Trap'),
(6, 'Hip Hop'),
(7, 'Rock'),
(8, 'Pop'),
(9, 'Jazz'),
(10, 'Electronica');
GO
INSERT INTO Productor (IdProductor, Nombre, Contacto)
VALUES 
(1, 'SOG', 'sog@example.com'), 
(2, 'XYZ', 'xyz@example.com'), 
(3, 'ABC Productions', 'abc@example.com'),
(4, 'Music Makers', 'musicmakers@example.com'), 
(5, 'Sound Waves', 'soundwaves@example.com'), 
(6, 'Creative Beats', 'creativebeats@example.com'),  
(7, 'Harmony Studios', 'harmonystudios@example.com'), 
(8, 'Rhythm Creators', 'rhythmcreators@example.com'),
(9, 'TuneCrafters', 'tunecrafters@example.com'), 
(10, 'Audio Express', 'audioexpress@example.com'); 
GO
INSERT INTO Compositor (IdCompositor, Nombre, Contacto)
VALUES 
(1, 'Carlos Arango', 'ca3101@example.com'), 
(2, 'María Rodríguez', 'maria@example.com'), 
(3, 'Juan Pérez', 'juan@example.com'),
(4, 'Ana Gómez', 'ana@example.com'), 
(5, 'Luis González', 'luis@example.com'), 
(6, 'Laura Martínez', 'laura@example.com'), 
(7, 'Javier Ramírez', 'javier@example.com'),
(8, 'Sofía López', 'sofia@example.com'), 
(9, 'Diego Sánchez', 'diego@example.com'), 
(10, 'Valentina Torres', 'valentina@example.com'),
(11, 'Juanito Perez', 'juanito@example.com'); 
GO
INSERT INTO Artista (IdArtista, Nombre, Contacto)
VALUES 
(1, 'Hector Lavoe', 'hlavoe@example.com'), 
(2, 'Romeo Santos', 'romeosantos21@example.com'), 
(3, 'Manuel Turizo', 'turizo@example.com'), 
(4, 'Blessd', 'bendi@example.com'), 
(5, 'Bad Bunny', 'balbo@example.com'), 
(6, '50 Cent', 'fifty@example.com'), 
(7, 'Guns N Roses', 'Gns&Rss@example.com'), 
(8, 'The Weeknd', 'wknd@example.com'), 
(9, 'Frank Sinatra', 'franksinatra@example.com'), 
(10, 'Martin Garrix', 'garrixmartin@example.com'),
(11, 'Juan Machado', 'machado@example.com');
GO
INSERT INTO Artista (IdArtista, Contacto)
VALUES 
(12, 'ca3101@gmail.com')
GO
INSERT INTO Album (IdAlbum,Titulo,Lanzamiento,Id_Artista)
VALUES 
(1, 'Formula, Vol. 1', '2011-01-01', 2), 
(2, 'SIEMPRE BLESSD', '2022-11-03', 4), 
(3, 'Comedia', '1978-01-01', 1),
(4, 'X100PRE', '2018-12-23', 5),
(5, '2000', '2023-03-17', 3),
(6, 'Sentio', '2022-03-25', 10), 
(7, 'Starboy', '2018-04-20', 8),
(8, 'Get Rich Or Die Tryin', '2003-01-01', 6),
(9, 'Appetite For Destruction', '1987-07-21', 7),
(10, 'Nothing But The Best', '2008-01-01', 9);
GO
INSERT INTO Cancion (IdCancion, Titulo, Milisegundos, Lanzamiento, Estado, Id_Compositor, Id_Productor, Id_Album, Id_Genero)
VALUES 
(1, 'Fly Me To The Moon', 148000,'2008-01-01', 1, 2, 4, 10, 9), 
(2, 'Follow', 222000,'2022-03-25', 1, 6, 9, 6, 10), 
(3, 'In Da Club', 197000,'2003-01-01', 1, 5, 10, 8, 6), 
(4, 'La Diabla', 240000,'2011-01-01', 1, 3, 3, 1, 2), 
(5, 'Die for you', 260000,'2018-04-20', 1, 8, 2, 7, 8), 
(6, 'OJITOS ROJOS', 222000,'2022-03-25', 1, 1, 1, 2, 4), 
(7, 'OTRA NOCHE EN MIAMI', 234000,'2018-12-23', 1, 9, 5, 4, 5), 
(8, 'El Cantante', 274000,'1978-01-01', 1, 10, 6, 3, 1), 
(9, 'De 100 a 0', 206000,'2022-03-25', 1, 4, 7, 5, 3), 
(10, 'Sweet Child O Mine', 300000,'1987-07-21', 1, 7, 8, 9, 7); 
GO
INSERT INTO Cancion (IdCancion, Titulo, Milisegundos, Lanzamiento, Estado, Id_Compositor, Id_Productor, Id_Genero)
VALUES 
(11, 'UN PREVIEW', 190000,'2023-09-24', 1, 9, 4, 5);
GO
INSERT INTO CancionXArtista (IdCancionXArtista, Id_Artista, Id_Cancion)
VALUES 
(1, 4, 6),
(2, 10, 2),
(3, 7, 10),
(4, 1, 8),
(5, 3, 9),
(6, 9, 1),
(7, 2, 4),
(8, 5, 7),
(9, 8, 5),
(10, 6, 3);
GO
INSERT INTO CancionXArtista (IdCancionXArtista, Id_Cancion)
VALUES 
(11, 11);
GO
INSERT INTO CancionXArtista (IdCancionXArtista, Id_Artista)
VALUES 
(12, 11);
GO
INSERT INTO Premios (IdPremio, Cantidad, Id_Cancion)
VALUES 
(1, 2, 1),
(2, 5, 10),
(3, 0, 6),
(4, 3, 3),
(5, 0, 9),
(6, 4, 4),
(7, 8, 5),
(8, 7, 8),
(9, 1, 2),
(10, 2, 7);
GO
INSERT INTO Proyecto (IdProyecto, Titulo, FechaInicio ,FechaFinalizacion, Presupuesto, Id_Cancion)
VALUES 
(1, 'El Bendito','2022-01-01','2022-09-01', 20000, 6),
(2, 'Trap Urbano','2018-03-01','2018-10-15', 40000, 7),
(3, 'Classic Jazz','2007-05-01','2007-11-01', 10000, 1),
(4, 'Rockses','1986-01-13','1987-02-21', 50000, 10),
(5, 'Romeo','2010-02-03','2010-11-01', 45000, 4),
(6, 'Gangsta','2002-01-01','2002-08-25', 60000, 3),
(7, 'Electronicxx','2021-03-28','2021-01-12', 70000, 2),
(8, 'La Voz','1977-01-01','1977-12-12', 15000, 8),
(9, '80s','2017-06-21','2018-02-12', 85000, 5),
(10, 'MTZ','2022-03-01','2022-07-17', 20000, 9),
(11, 'MRAW','2022-03-01','2022-07-17', 25000, 9);
GO
-- 9)
UPDATE Proyecto 
SET Titulo = 'ManuelTZ' 
WHERE IdProyecto = 10;
GO
UPDATE Premios
SET Cantidad = 1
WHERE IdPremio = 3;
GO
DELETE FROM Proyecto
WHERE IdProyecto = 11;
GO
DELETE FROM Compositor
WHERE Nombre LIKE 'Juanito%';
GO
TRUNCATE TABLE Proyecto;
GO
TRUNCATE TABLE Premios;
GO
INSERT INTO Proyecto (IdProyecto, Titulo, FechaInicio ,FechaFinalizacion, Presupuesto, Id_Cancion)
VALUES 
(1, 'El Bendito','2022-01-01','2022-09-01', 20000, 6),
(2, 'Trap Urbano','2018-03-01','2018-10-15', 40000, 7),
(3, 'Classic Jazz','2007-05-01','2007-11-01', 10000, 1),
(4, 'Rockses','1986-01-13','1987-02-21', 50000, 10),
(5, 'Romeo','2010-02-03','2010-11-01', 45000, 4),
(6, 'Gangsta','2002-01-01','2002-08-25', 60000, 3),
(7, 'Electronicxx','2021-03-28','2021-01-12', 70000, 2),
(8, 'La Voz','1977-01-01','1977-12-12', 15000, 8),
(9, '80s','2017-06-21','2018-02-12', 85000, 5),
(10, 'MTZ','2022-03-01','2022-07-17', 20000, 9);
GO
INSERT INTO Proyecto (IdProyecto, Titulo, FechaInicio)
VALUES 
(11, 'Desconocido', '2023-10-05');
GO
INSERT INTO Proyecto (IdProyecto, Titulo)
VALUES 
(12,'MilloGang'),
(13,'KR');
GO
INSERT INTO Premios (IdPremio, Cantidad, Id_Cancion)
VALUES 
(1, 2, 1),
(2, 5, 10),
(3, 0, 6),
(4, 3, 3),
(5, 0, 9),
(6, 4, 4),
(7, 8, 5),
(8, 7, 8),
(9, 1, 2),
(10, 2, 7);
GO
-- 10)
-- SELECT, DISTINCT
SELECT Milisegundos, Lanzamiento FROM Cancion;
GO
SELECT DISTINCT Milisegundos FROM Cancion;
GO
SELECT DISTINCT Lanzamiento FROM Cancion;
GO
-- ORDER BY DESC, ASC, OFFSET FETCH
SELECT * FROM Compositor 
ORDER BY Nombre ASC;
GO
SELECT * FROM Compositor 
ORDER BY Nombre DESC;
GO
SELECT * FROM Album 
ORDER BY Titulo ASC
OFFSET 2 ROWS
FETCH NEXT 5 ROWS ONLY;
GO
SELECT * FROM Album 
ORDER BY Titulo DESC
OFFSET 3 ROWS 
FETCH NEXT 4 ROWS ONLY;
GO
-- BETWEEN, AND
SELECT Lanzamiento FROM Album
WHERE Lanzamiento BETWEEN '2011-01-01' AND '2023-10-05';
GO
SELECT Milisegundos FROM Cancion
WHERE Milisegundos BETWEEN 270000 AND 300000;
GO
-- IN, NOT IN, LIKE, SELECT-FROM-WHERE
SELECT Titulo, Milisegundos FROM Cancion 
WHERE Milisegundos IN (148000,197000,300000,206000);
GO
SELECT Titulo,Presupuesto FROM Proyecto
WHERE Presupuesto IN(20000, 40000, 10000);
GO
SELECT Titulo, Milisegundos FROM Cancion 
WHERE Milisegundos NOT IN (148000,197000,300000,206000);
GO
SELECT Titulo,Presupuesto FROM Proyecto
WHERE Presupuesto NOT IN(20000, 40000, 10000);
GO
SELECT Nombre FROM Productor
WHERE Nombre LIKE 'A%';
GO
SELECT FechaFinalizacion FROM Proyecto
WHERE FechaFinalizacion LIKE '%-%-01';
GO
-- GROUP BY, HAVING, ORDER BY, SELECT * FROM-WHERE, AND OR
SELECT Cantidad, Id_Cancion FROM Premios 
GROUP BY Cantidad, Id_Cancion
HAVING Cantidad > 2 AND Cantidad <= 4
ORDER BY Cantidad ASC;
GO
SELECT Lanzamiento, IdCancion FROM Cancion 
GROUP BY Lanzamiento, IdCancion
HAVING Lanzamiento >= '2008-01-01' AND Lanzamiento < '2018-12-31'
ORDER BY Lanzamiento DESC;
GO
SELECT * FROM Proyecto
WHERE Titulo = 'Rockses' OR Titulo = 'Electronicxx';
GO
SELECT * FROM Album
WHERE Id_Artista = 1 OR Id_Artista = 4;
GO
-- SQL JOINS (INNER, LEFT, RIGHT, FULL)
SELECT p.Titulo, c.Titulo AS Cancion
FROM Proyecto p 
INNER JOIN Cancion c ON p.Id_Cancion = c.IdCancion;
GO
SELECT c.Titulo AS Cancion, a.Nombre AS Artista
FROM Cancion c
INNER JOIN CancionXArtista ca ON c.IdCancion = ca.Id_Cancion
INNER JOIN Artista a ON ca.Id_Artista = a.IdArtista;
GO
SELECT c.Titulo AS Cancion, a.Titulo AS Album
FROM Cancion c
LEFT JOIN Album a ON a.IdAlbum = c.Id_Album;
GO
SELECT a.Nombre AS Artista, c.Titulo AS Cancion
FROM Artista a
JOIN CancionXArtista ca ON a.IdArtista = ca.Id_Artista
RIGHT JOIN Cancion c ON c.IdCancion = ca.Id_Cancion;
GO 
SELECT a.Nombre AS Artista, c.Titulo AS Cancion
FROM Artista a
JOIN CancionXArtista ca ON a.IdArtista = ca.Id_Artista
LEFT JOIN Cancion c ON c.IdCancion = ca.Id_Cancion;
GO
SELECT a.Nombre AS Artista, c.Titulo AS Cancion
FROM Artista a
JOIN CancionXArtista ca ON a.IdArtista = ca.Id_Artista
FULL JOIN Cancion c ON c.IdCancion = ca.Id_Cancion;
GO
SELECT c.Titulo AS Cancion, p.Titulo AS Proyecto
FROM Cancion c
RIGHT JOIN Proyecto p ON p.Id_Cancion = c.IdCancion;
GO
SELECT c.Titulo AS Cancion, p.Titulo AS Proyecto
FROM Cancion c
FULL JOIN Proyecto p ON p.Id_Cancion = c.IdCancion;
GO
-- 11)
-- SUM, COUNT(*), COUNT(columna), MIN, MAX, AVG
SELECT SUM(Presupuesto) AS [Presupuesto Total]
FROM Proyecto;
GO
SELECT SUM(Cantidad) AS [Premios Totales]
FROM Premios;
GO
SELECT COUNT(*) 
FROM Cancion;
GO
SELECT COUNT(*)
FROM Proyecto;
GO
SELECT COUNT(Milisegundos)
FROM Cancion
GROUP BY Milisegundos;
GO
SELECT COUNT(Presupuesto)
FROM Proyecto
GROUP BY Presupuesto;
GO
SELECT MIN(FechaFinalizacion) AS [Proyecto Mas Antiguo]
FROM Proyecto;
GO
SELECT MIN (Cantidad) AS [Menor cantidad de premios]
FROM Premios;
GO
SELECT MAX(Milisegundos) AS [Duracion mas larga]
FROM Cancion;
GO
SELECT MAX(Presupuesto) AS [Mayor Presupuesto]
FROM Proyecto;
GO
SELECT AVG(Milisegundos) AS [Promedio Duracion]
FROM Cancion;
GO
SELECT AVG(Cantidad) AS [Promedio de Premios]
FROM Premios;
GO
-- LOWER, UPPER
SELECT LOWER(Nombre) AS NombreMinus, UPPER(Contacto) AS ContactoMayus
FROM Artista;
GO
SELECT UPPER(Titulo) AS TituloMayus
FROM Album;
GO
SELECT LOWER(Nombre) AS GeneroMinus
FROM Genero;
GO
-- GETDATE, DAY, MONTH, YEAR, DATEDIFF
SELECT Lanzamiento, DAY(Lanzamiento) AS Dia, MONTH(Lanzamiento) AS Mes, YEAR(Lanzamiento) AS Año
FROM Cancion;
GO
SELECT DATEDIFF(YEAR,Lanzamiento,GETDATE()) AS AñosDesdeLanzamiento
FROM Cancion;
GO
SELECT FechaInicio, DAY(FechaInicio) AS Dia, MONTH(FechaInicio) AS Mes, YEAR(FechaInicio) AS Año
FROM Proyecto;
GO
SELECT DATEDIFF(DAY,FechaInicio,GETDATE()) AS DiasDesdeInicio
FROM Proyecto;
GO
-- CAST, CONVERT, PARSE
SELECT 'El codigo ' + CAST(IdCancion AS VARCHAR(5))
+ ' corresponde a la cancion ' + Titulo + ' y tiene una duracion de ' + CAST(Milisegundos AS VARCHAR(7))
FROM Cancion;
GO
SELECT 'El artista ' + Nombre
+ ' con codigo ' + CAST(IdArtista AS VARCHAR(5)) + ' puede ser contactado al correo: ' + Contacto
FROM Artista;
GO
SELECT 'El Album con codigo ' + CONVERT(VARCHAR(5),IdAlbum) + ' y titulo ' + Titulo +
' fue lanzado al publico el ' + CONVERT(VARCHAR(10),Lanzamiento)
FROM Album;
GO
SELECT 'El proyecto ' + Titulo + ' inició el ' + CONVERT(VARCHAR(10),FechaInicio) + ' y finalizó el ' + CONVERT(VARCHAR(10),FechaFinalizacion) + 
' con un presupuesto total de ' + CONVERT(VARCHAR(10),Presupuesto)
FROM Proyecto;
GO
SELECT PARSE(CAST(Presupuesto AS VARCHAR) AS money USING 'en-US') AS Presupuesto
FROM Proyecto;
GO
SELECT PARSE(CAST(FechaFinalizacion AS VARCHAR) AS datetime2 USING 'es-US') AS FechaFinal
FROM Proyecto;
GO
-- CHOOSE, IF
SELECT Titulo,
CHOOSE(IdProyecto, 'Reggaeton','Trap','Jazz','Rock', 'Bachata', 
'Hip Hop','Electronica', 'Salsa','Pop','Merengue','','','') AS CategoriasMusicales
FROM Proyecto;
GO
SELECT Nombre,
CHOOSE(IdArtista, 'Bailar y Celebrar', 'Romance', 'Desamor', 'Motivación', 'Discoteca', 
'Disfrute de la Cultura Hip-Hop', 'Celebración', 'Cualquier Momento', 'Cena y relajación', 'Festivales', 'Desconocido') AS UsoComun  
FROM Artista;
GO
SELECT Titulo, Milisegundos,
IIF(Milisegundos > 240000, 'Mayor a 4min','Menor a 4min') AS Duracion
FROM Cancion
ORDER BY Milisegundos DESC;
GO
SELECT Titulo, Lanzamiento,
IIF(Lanzamiento > '2015-01-01', 'Reciente', 'Vieja Escuela') AS Antiguedad
FROM Album
ORDER BY Lanzamiento DESC;
GO
-- NULL: ISNULL, NULLIF, COALESCE
SELECT IdProyecto, Titulo, COALESCE(CAST(Presupuesto AS VARCHAR),'No Aplica') AS Dinero
FROM Proyecto;
GO
SELECT Contacto, COALESCE(Nombre,'Se desconoce') AS Nombre
FROM Artista;
GO
-- 12)