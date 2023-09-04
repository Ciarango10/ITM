ALTER TABLE Clientes
ADD CONSTRAINT CK_Clientes_Documento
CHECK (Documento > 0);