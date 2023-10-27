-- ISNULL()
-- Si el valor del primer argumento es nulo, se le asignará el valor del segundo argumento al campo
SELECT IdProyecto, Titulo, ISNULL(Presupuesto,0) AS Presupuesto
FROM Proyecto;

-- NULLIF()
-- Si los argumentos de la funcion tienen el mismo valor retorna NULL, de lo contrario
-- retorna el valor del primer argumento
SELECT NULLIF(Presupuesto,0) AS PresupuestoXProyecto
FROM Proyecto;

-- COALESCE()
-- Si el valor del primer argumento es nulo, se le asignará el valor del segundo argumento al campo
SELECT Contacto, COALESCE(Nombre,'Se desconoce') AS Nombre
FROM Artista;
