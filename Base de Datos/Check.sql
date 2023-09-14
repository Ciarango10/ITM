ALTER TABLE Clientes
ADD CONSTRAINT CK_Clientes_Documento
CHECK (Documento > 0);

ALTER TABLE Alumno
ADD CONSTRAINT CHK_Alumno_Incluye CHECK (Nombre NOT LIKE '%[^A-Za-z]%'), -- Incluye solo letras
ADD CONSTRAINT CHK_Alumno_Excluye CHECK (Nombre LIKE '%[^0-9]%'); -- Excluye números