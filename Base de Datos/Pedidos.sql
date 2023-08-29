CREATE TABLE Clientes(
	IdC int identity(1,1),
	IdCliente int primary key,
	Nombre varchar(50) not null,
	Apellido varchar(50) not null,
	Telefono varchar(50) not null
)

CREATE TABLE Categoria(
	IdCar int identity(1,1),
	CodCategory int primary key,
	Categoria varchar(50) not null
)

CREATE TABLE Producto(
	IdP int identity(1,1),
	CodProducto int primary key,
	NombreProducto varchar(50) not null,
	PrecioUnitario money not null,
	CodCategory int not null
)

CREATE TABLE Pedidos(
	IdPedidos int identity(1,1) primary key,
	IdCliente int not null,
	CodProducto int not null
)