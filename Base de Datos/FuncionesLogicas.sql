-- IIF()
-- Si la condicion del primer argumento se cumple,
-- se muestra el valor del segundo argumento sino, 
-- se muestra el valor del tercer argumento en una columna adicional
SELECT Titulo, Lanzamiento,
IIF(Lanzamiento > '2015-01-01', 'Reciente', 'Vieja Escuela') AS Antiguedad
FROM Album
ORDER BY Lanzamiento DESC;

-- CHOOSE()
-- Toma como entrada un índice (número entero) y una lista de valores. Luego, devuelve el valor que corresponde al índice especificado en la lista de valores.
SELECT Titulo,
CHOOSE(IdProyecto, 'Reggaeton','Trap','Jazz','Rock', 'Bachata', 
'Hip Hop','Electronica', 'Salsa','Pop','Merengue','') AS CategoriasMusicales
FROM Proyecto;