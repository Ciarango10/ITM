SELECT * FROM Album 
ORDER BY Titulo ASC
OFFSET 0 ROWS -- Apartir de la fila 1
FETCH NEXT 5 ROWS ONLY; -- Muestra las siguientes 5 filas
GO
SELECT * FROM Album 
ORDER BY Titulo DESC
OFFSET 3 ROWS -- Apartir de la fila 4
FETCH NEXT 4 ROWS ONLY; -- Muestra las siguientes 4 filas