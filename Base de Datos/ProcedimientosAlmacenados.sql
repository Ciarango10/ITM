CREATE PROCEDURE sp_Cancion
	@Titulo VARCHAR(25)
AS
	SELECT * FROM Cancion
	WHERE Titulo LIKE @Titulo+'%';
EXECUTE sp_Cancion 'O';

CREATE PROCEDURE sp_Insertar_Artista
	@IdArtista INT,
	@Nombre VARCHAR(25),
	@Contacto VARCHAR(30) 
AS
BEGIN
	INSERT INTO Artista (IdArtista, Nombre,Contacto) VALUES (@IdArtista,@Nombre, @Contacto);
END
EXECUTE sp_Insertar_Artista 14, 'Adele', 'adele@business.com';

CREATE PROCEDURE sp_Editar_Productor
	@IdProductor INT,
	@Nombre VARCHAR(25),
	@Contacto VARCHAR(30)
AS
	UPDATE Productor
	SET Nombre = @Nombre,
	Contacto = @Contacto
	WHERE IdProductor = @IdProductor;
EXECUTE sp_Editar_Productor 1, 'SOGX', 'sog@business.com';