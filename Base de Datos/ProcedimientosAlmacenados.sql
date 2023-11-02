CREATE PROCEDURE sp_Cancion
	@Titulo VARCHAR(25)
AS
	SELECT * FROM Cancion
	WHERE Titulo LIKE @Titulo+'%';
GO
EXECUTE sp_Cancion 'O';
GO

CREATE PROCEDURE sp_Insertar_Artista
	@IdArtista INT,
	@Nombre VARCHAR(25),
	@Contacto VARCHAR(30) 
AS
BEGIN
	INSERT INTO Artista (IdArtista, Nombre,Contacto) VALUES (@IdArtista,@Nombre, @Contacto);
END
GO
EXECUTE sp_Insertar_Artista 14, 'Adele', 'adele@business.com';
GO