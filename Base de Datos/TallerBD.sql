--TALLER 
-- 1)
SELECT p.PeliculaTitulo FROM Pelicula p 
INNER JOIN Director d ON d.DirectorCodigo = p.PeliculaDirector
WHERE d.DirectorNombre = 'Alfred Hitchcock';

-- 2)
SELECT COUNT(*) FROM Pelicula
WHERE PeliculaTitulo = 'Titanic';
 
-- 3)
SELECT a.* FROM Alquirer a
INNER JOIN Cliente c ON c.ClienteCodigo = a.ClienteCodigo
WHERE c.ClienteNombre = 'Claudia Hernandez';

-- 4)
SELECT r.* FROM Pelicula p 
INNER JOIN Reparto r ON r.PeliculaCodigo = p.PeliculaCodigo
WHERE p.PeliculaTitulo = 'Casa Blanca';

--5) 
SELECT p.PeliculaTitulo FROM Pelicula p 
INNER JOIN Reparto r ON r.PeliculaCodigo = p.PeliculaCodigo
INNER JOIN Actor a ON a.ActorCodigo = r.PeliculaActor
WHERE a.ActorNombre = 'Will Smith';

--6)
SELECT PeliculaTitulo FROM Pelicula 
WHERE PeliculaFecha LIKE '2019-12-%';

--7) 
SELECT PeliculaTitulo FROM Pelicula p
INNER JOIN Ejemplar e ON e.PeliculaCodigo = p.PeliculaCodigo
INNER JOIN DetalleAlquiler da ON da.EjemplarCodigo = e.EjemplarCodigo
INNER JOIN Alquiler a ON a.NumeroAlquiler = da.NumeroAlquiler
WHERE a.AlquilerFecha LIKE '2020-03-%';

--8)
SELECT TOP 5 COUNT(e.EjemplarCodigo) FROM Pelicula p
INNER JOIN Ejemplar e ON e.PeliculaCodigo = p.PeliculaCodigo;

