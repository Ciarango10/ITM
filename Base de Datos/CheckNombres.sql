ALTER TABLE Alumno
ADD CONSTRAINT CHK_Alumno CHECK(Nombre NOT LIKE '%[^A-Z-az]%') --Incluye
ADD CONSTRAINT CHK_Alumno CHECK(Nombre LIKE '%[^0-9]%') --Excluye
