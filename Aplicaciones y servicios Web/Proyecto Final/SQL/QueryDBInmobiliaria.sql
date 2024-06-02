CREATE DATABASE DBInmobiliaria
ON primary 
(name = inmobiliaria, filename = 'D:\Carlos Arango\Codigo\ITM\Aplicaciones y servicios Web\Proyecto Final\SQL\inmobiliaria.mdf', size = 50mb, filegrowth = 25%)
LOG ON 
(name = inmobiliariaLog, filename = 'D:\Carlos Arango\Codigo\ITM\Aplicaciones y servicios Web\Proyecto Final\SQL\inmobiliaria.ldf', size = 25mb, filegrowth = 25%);
GO
USE DBInmobiliaria;
GO
CREATE TABLE Pais (
	IdPais int identity(1,1) primary key,
	Nombre varchar(25) not null
);
GO
CREATE TABLE Departamento (
	IdDepartamento int identity(1,1) primary key,
	Nombre varchar(25) not null,
	Id_Pais int,
	Constraint FKPais_Departamento foreign key (Id_Pais) references Pais(IdPais)
);
GO
CREATE TABLE Ciudad (
	IdCiudad int identity(1,1) primary key,
	Nombre varchar(25) not null,
	Id_Departamento int,
	Constraint FKDepartamento_Ciudad foreign key (Id_Departamento) references Departamento(IdDepartamento)
);
GO
CREATE TABLE Estado (
	IdEstado int identity(1,1) primary key,
	Nombre varchar(25) not null,
	Descripcion varchar(100)
);
GO 
CREATE TABLE Cliente (
	Documento varchar(20) primary key,
	Nombre varchar(50) not null,
	PrimerApellido varchar(50) not null,
	SegundoApellido varchar(50) not null,
	Direccion varchar(200) not null,
	Email varchar(50),
	Telefono varchar(20),
	FechaNacimiento date
);
GO
CREATE TABLE Empleado (
	Documento varchar(20) primary key,
	Nombre varchar(50) not null,
	PrimerApellido varchar(50) not null,
	SegundoApellido varchar(50) not null,
	Direccion varchar(200) not null,
	Email varchar(50),
	Telefono varchar(20),
	FechaNacimiento date
);
GO
CREATE TABLE Cargo(
	Codigo int primary key,
	Nombre varchar(50) not null,
	Salario int not null
);
GO
CREATE TABLE EmpleadoCargo(
	Codigo int primary key,
	FechaInicio date,
	FechaFin date,
	Documento_Empleado varchar(20),
	Codigo_Cargo int,
	Constraint FKEmpleado_EmpleadoCargo foreign key (Documento_Empleado) references Empleado(Documento),
	Constraint FKCargo_EmpleadoCargo foreign key (Codigo_Cargo) references Cargo(Codigo)
);
GO
CREATE TABLE Queja (
	IdQueja int identity(1,1) primary key,
	Fecha date,
	Descripcion varchar(100) not null,
	Id_Estado int,
	Documento_Cliente varchar(20),
	Documento_Empleado varchar(20),
	Constraint FKEstado_Queja foreign key (Id_Estado) references Estado(IdEstado),
	Constraint FKCliente_Queja foreign key (Documento_Cliente) references Cliente(Documento),
	Constraint FKEmpleado_Queja foreign key (Documento_Empleado) references Empleado(Documento)
);
GO
CREATE TABLE TipoInmueble (
	IdTipoInmueble int identity(1,1) primary key,
	Tipo varchar(30) not null
);
GO 
CREATE TABLE Inmueble (
	IdInmueble int identity(1,1) primary key,
	Direccion varchar(30) not null,
	Precio float not null,
	Area float not null,
	NroHabitaciones int not null,
	NroBaños int not null,
	Estado varchar(50) not null,
	Caracteristicas varchar(200) not null,
	FechaPublicacion date,
	Id_Ciudad int,
	Id_TipoInmueble int,
	Constraint FKCiudad_Inmueble foreign key (Id_Ciudad) references Ciudad(IdCiudad),
	Constraint FKTipoInmueble_Inmueble foreign key (Id_TipoInmueble) references TipoInmueble(IdTipoInmueble)
);
GO
CREATE TABLE Visita (
	IdVisita int identity(1,1) primary key,
	Fecha date,
	Comentarios varchar(100),
	Documento_Cliente varchar(20),
	Documento_Empleado varchar(20),
	Id_Inmueble int,
	Constraint FKCliente_Visita foreign key (Documento_Cliente) references Cliente(Documento),
	Constraint FKEmpleado_Visita foreign key (Documento_Empleado) references Empleado(Documento),
	Constraint FKInmueble_Visita foreign key (Id_Inmueble) references Inmueble(IdInmueble)
);
GO
CREATE TABLE FormaPago(
	IdFormaPago int identity(1,1) primary key,
	Tipo varchar(15) not null,
	Detalles varchar(100)
);
GO
CREATE TABLE Venta (
	IdVenta int identity(1,1) primary key,
	Fecha date,
	Precio float not null,
	Documento_Cliente varchar(20),
	Documento_Empleado varchar(20),
	Id_Inmueble int,
	Id_FormaPago int,
	Constraint FKCliente_Venta foreign key (Documento_Cliente) references Cliente(Documento),
	Constraint FKEmpleado_Venta foreign key (Documento_Empleado) references Empleado(Documento),
	Constraint FKInmueble_Venta foreign key (Id_Inmueble) references Inmueble(IdInmueble),
	Constraint FKFormaPago_Venta foreign key (Id_FormaPago) references FormaPago(IdFormaPago)
);
GO
CREATE TABLE Contrato (
	IdContrato int identity(1,1) primary key,
	Fecha_Inicio date not null,
	Fecha_Fin date not null,
	Monto float not null,
	Documento_Cliente varchar(20),
	Documento_Empleado varchar(20),
	Id_Inmueble int,
	Constraint FKCliente_Contrato foreign key (Documento_Cliente) references Cliente(Documento),
	Constraint FKEmpleado_Contrato foreign key (Documento_Empleado) references Empleado(Documento),
	Constraint FKInmueble_Contrato foreign key (Id_Inmueble) references Inmueble(IdInmueble)
);
GO
CREATE TABLE Comision (
	IdComision int identity(1,1) primary key,
	Fecha date,
	Monto float not null,
	Id_Contrato int,
	Constraint FKContrato_Comision foreign key (Id_Contrato) references Contrato(IdContrato)
);
GO
CREATE TABLE Arriendo (
	IdArriendo int identity(1,1) primary key,
	Fecha_Inicio date not null,
	Fecha_Fin date not null,
	Precio_Mensual float not null,
	Documento_Cliente varchar(20),
	Documento_Empleado varchar(20),
	Id_Inmueble int,
	Id_FormaPago int,
	Constraint FKCliente_Arriendo foreign key (Documento_Cliente) references Cliente(Documento),
	Constraint FKEmpleado_Arriendo foreign key (Documento_Empleado) references Empleado(Documento),
	Constraint FKInmueble_Arriendo foreign key (Id_Inmueble) references Inmueble(IdInmueble),
	Constraint FKFormaPago_Arriendo foreign key (Id_FormaPago) references FormaPago(IdFormaPago)
);
GO
CREATE TABLE Usuario (
	IdUsuario int identity(1,1) primary key,
	Documento_Empleado varchar(20),
	UserName varchar(50) not null,
	Clave nvarchar(2000) not null,
	Salt nvarchar(2000) not null,
	Constraint FKEmpleado_Usuario foreign key (Documento_Empleado) references Empleado(Documento)
);
GO
CREATE TABLE Perfil (
	IdPerfil int identity(1,1) primary key,
	Nombre varchar(50) not null,
	PaginaNavegar varchar(50) not null
);
GO
CREATE TABLE Usuario_Perfil (
	IdUsuarioPerfil int identity(1,1) primary key,
	IdUsuario int not null,
	IdPerfil int not null,
	Activo bit not null
	Constraint FKUsuario_UsuarioPerfil foreign key (IdUsuario) references Usuario(IdUsuario),
	Constraint FKPerfil_UsuarioPerfil foreign key (IdPerfil) references Perfil(IdPerfil)
);
GO
CREATE TABLE Factura(
	Numero int primary key not null, 
	Documento varchar(20) not null,
	Fecha datetime not null,
	CodigoEmpleado int not null,
	Constraint FKFactura_Cliente foreign key (Documento) references Cliente(Documento),
	Constraint FKFactura_EmpleadoCargo foreign key (CodigoEmpleado) references EmpleadoCargo(Codigo)
);
GO
CREATE TABLE DetalleFactura(
	Codigo int identity(1,1) primary key not null,
	Numero int not null, 
	CodigoInmueble int not null,
	Cantidad int not null,
	ValorUnitario float not null,
	Constraint FKDetalleFactura_Inmueble foreign key (CodigoInmueble) references Inmueble(IdInmueble),
	Constraint FKDetalleFactura_Factura foreign key (Numero) references Factura(Numero)
);
