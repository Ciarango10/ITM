CREATE TABLE HistorialArtista
(CodHistorialArtista int identity(1,1) primary key,
Fecha date,
Accion varchar(100),
Usuario varchar(100)
)
GO
CREATE TRIGGER Tr_Insert_Artista
ON Artista AFTER INSERT 
AS 
BEGIN 
	INSERT INTO HistorialArtista (Fecha, Accion, Usuario)
	VALUES (GETDATE(), 'Se agregó un Artista', USER);
END
GO
INSERT INTO Artista (IdArtista, Nombre, Contacto) 
VALUES (16, 'Eladio Carrion', 'eladio@example.com');
GO
CREATE TRIGGER Tr_Delete_Artista
ON Artista FOR DELETE 
AS 
BEGIN 
	INSERT INTO HistorialArtista (Fecha, Accion, Usuario)
	VALUES (GETDATE(), 'Se eliminó un Artista', USER);
END
GO
DELETE FROM Artista WHERE IdArtista = 16;
GO
CREATE TRIGGER Tr_Update_Artista
ON Artista AFTER UPDATE
AS 
BEGIN 
	INSERT INTO HistorialArtista (Fecha, Accion, Usuario)
	VALUES (GETDATE(), 'Se actualizó un Artista', USER);
END
GO
UPDATE Artista
SET Nombre = 'Bruno Marte' 
WHERE IdArtista = 15;
GO
