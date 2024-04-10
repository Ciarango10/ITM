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
	Nombre varchar(25)
);
GO
CREATE TABLE Departamento (
	IdDepartamento int identity(1,1) primary key,
	Nombre varchar(25),
	Id_Pais int,
	Constraint FKPais_Departamento foreign key (Id_Pais) references Pais(IdPais)
);
GO
CREATE TABLE Ciudad (
	IdCiudad int identity(1,1) primary key,
	Nombre varchar(25),
	Id_Departamento int,
	Constraint FKDepartamento_Ciudad foreign key (Id_Departamento) references Departamento(IdDepartamento)
);
GO
CREATE TABLE Estado (
	IdEstado int identity(1,1) primary key,
	Nombre varchar(25),
	Descripcion varchar(100)
);
GO 
CREATE TABLE Cliente (
	IdCliente int identity(1,1) primary key,
	Documento varchar(20),
	Nombre varchar(50),
	Email varchar(50),
	Telefono varchar(20)
);
GO
CREATE TABLE Empleado (
	IdEmpleado int identity(1,1) primary key,
	Documento varchar(20),
	Nombre varchar(50),
	Email varchar(50),
	Telefono varchar(20)
);
GO
CREATE TABLE Queja (
	IdQueja int identity(1,1) primary key,
	Fecha date,
	Descripcion varchar(100),
	Id_Estado int,
	Id_Cliente int,
	Id_Empleado int,
	Constraint FKEstado_Queja foreign key (Id_Estado) references Estado(IdEstado),
	Constraint FKCliente_Queja foreign key (Id_Cliente) references Cliente(IdCliente),
	Constraint FKEmpleado_Queja foreign key (Id_Empleado) references Empleado(IdEmpleado)
);
GO
CREATE TABLE TipoInmueble (
	IdTipoInmueble int identity(1,1) primary key,
	Tipo varchar(30)
);
GO 
CREATE TABLE Inmueble (
	IdInmueble int identity(1,1) primary key,
	Direccion varchar(30),
	Precio float,
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
	Id_Cliente int,
	Id_Empleado int,
	Id_Inmueble int,
	Constraint FKCliente_Visita foreign key (Id_Cliente) references Cliente(IdCliente),
	Constraint FKEmpleado_Visita foreign key (Id_Empleado) references Empleado(IdEmpleado),
	Constraint FKInmueble_Visita foreign key (Id_Inmueble) references Inmueble(IdInmueble)
);
GO
CREATE TABLE FormaPago(
	IdFormaPago int identity(1,1) primary key,
	Tipo varchar(15),
	Detalles varchar(100)
);
GO
CREATE TABLE Venta (
	IdVenta int identity(1,1) primary key,
	Fecha date,
	Precio float,
	Id_Cliente int,
	Id_Empleado int,
	Id_Inmueble int,
	Id_FormaPago int,
	Constraint FKCliente_Venta foreign key (Id_Cliente) references Cliente(IdCliente),
	Constraint FKEmpleado_Venta foreign key (Id_Empleado) references Empleado(IdEmpleado),
	Constraint FKInmueble_Venta foreign key (Id_Inmueble) references Inmueble(IdInmueble),
	Constraint FKFormaPago_Venta foreign key (Id_FormaPago) references FormaPago(IdFormaPago)
);
GO
CREATE TABLE Contrato (
	IdContrato int identity(1,1) primary key,
	Fecha_Inicio date,
	Fecha_Fin date,
	Monto float,
	Id_Cliente int,
	Id_Empleado int,
	Id_Inmueble int,
	Constraint FKCliente_Contrato foreign key (Id_Cliente) references Cliente(IdCliente),
	Constraint FKEmpleado_Contrato foreign key (Id_Empleado) references Empleado(IdEmpleado),
	Constraint FKInmueble_Contrato foreign key (Id_Inmueble) references Inmueble(IdInmueble)
);
GO
CREATE TABLE Comision (
	IdComision int identity(1,1) primary key,
	Fecha date,
	Monto float,
	Id_Contrato int,
	Constraint FKContrato_Comision foreign key (Id_Contrato) references Contrato(IdContrato)
);
GO
CREATE TABLE Arriendo (
	IdArriendo int identity(1,1) primary key,
	Fecha_Inicio date,
	Fecha_Fin date,
	Precio_Mensual float,
	Id_Cliente int,
	Id_Empleado int,
	Id_Inmueble int,
	Id_FormaPago int,
	Constraint FKCliente_Arriendo foreign key (Id_Cliente) references Cliente(IdCliente),
	Constraint FKEmpleado_Arriendo foreign key (Id_Empleado) references Empleado(IdEmpleado),
	Constraint FKInmueble_Arriendo foreign key (Id_Inmueble) references Inmueble(IdInmueble),
	Constraint FKFormaPago_Arriendo foreign key (Id_FormaPago) references FormaPago(IdFormaPago)
);