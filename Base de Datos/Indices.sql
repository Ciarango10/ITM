-- Indice Agrupado
CREATE CLUSTERED INDEX CL_NombreIndice ON Tabla(campo);

-- Indice NO Agrupado
CREATE NONCLUSTERED INDEX CL_NombreIndice ON Tabla(campo);

-- Indice Columnar
CREATE CLUSTERED COLUMNSTORE INDEX CL_NombreIndice ON Tabla(campo);