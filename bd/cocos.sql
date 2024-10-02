USE [master]
GO
/****** Object:  Database [supermercado_cocos]    Script Date: 2/10/2024 18:55:15 ******/
CREATE DATABASE [supermercado_cocos]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'supermercado_cocos', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\supermercado_cocos.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'supermercado_cocos_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\supermercado_cocos_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT
GO
ALTER DATABASE [supermercado_cocos] SET COMPATIBILITY_LEVEL = 150
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [supermercado_cocos].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [supermercado_cocos] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [supermercado_cocos] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [supermercado_cocos] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [supermercado_cocos] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [supermercado_cocos] SET ARITHABORT OFF 
GO
ALTER DATABASE [supermercado_cocos] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [supermercado_cocos] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [supermercado_cocos] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [supermercado_cocos] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [supermercado_cocos] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [supermercado_cocos] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [supermercado_cocos] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [supermercado_cocos] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [supermercado_cocos] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [supermercado_cocos] SET  DISABLE_BROKER 
GO
ALTER DATABASE [supermercado_cocos] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [supermercado_cocos] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [supermercado_cocos] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [supermercado_cocos] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [supermercado_cocos] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [supermercado_cocos] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [supermercado_cocos] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [supermercado_cocos] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [supermercado_cocos] SET  MULTI_USER 
GO
ALTER DATABASE [supermercado_cocos] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [supermercado_cocos] SET DB_CHAINING OFF 
GO
ALTER DATABASE [supermercado_cocos] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [supermercado_cocos] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [supermercado_cocos] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [supermercado_cocos] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
ALTER DATABASE [supermercado_cocos] SET QUERY_STORE = OFF
GO
USE [supermercado_cocos]
GO
/****** Object:  Table [dbo].[clientes]    Script Date: 2/10/2024 18:55:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[clientes](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[dni] [int] NULL,
	[apellido] [varchar](255) NULL,
	[email] [varchar](255) NULL,
	[telefono] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[descuentos]    Script Date: 2/10/2024 18:55:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[descuentos](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[detalle_venta]    Script Date: 2/10/2024 18:55:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[detalle_venta](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[id_venta] [bigint] NULL,
	[id_producto] [bigint] NULL,
	[cant_producto] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[empleados]    Script Date: 2/10/2024 18:55:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[empleados](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[dni] [varchar](255) NULL,
	[nombre] [varchar](255) NULL,
	[direccion] [varchar](255) NULL,
	[contacto] [varchar](255) NULL,
	[cod_emp] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[horarios_empleados]    Script Date: 2/10/2024 18:55:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[horarios_empleados](
	[id_empleado] [bigint] NULL,
	[turno] [varchar](255) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[info_proveedores]    Script Date: 2/10/2024 18:55:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[info_proveedores](
	[id_proveedores] [bigint] NULL,
	[direccion] [varchar](255) NULL,
	[telefono] [int] NULL,
	[ciudad] [varchar](255) NULL,
	[email] [varchar](255) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[marcas]    Script Date: 2/10/2024 18:55:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[marcas](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[pedidos]    Script Date: 2/10/2024 18:55:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[pedidos](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[id_productos] [bigint] NULL,
	[id_proveedor] [bigint] NULL,
	[estado] [varchar](255) NULL,
	[cantidad] [int] NULL,
	[fecha_entrega] [date] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[productos]    Script Date: 2/10/2024 18:55:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[productos](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](255) NULL,
	[descripcion] [varchar](255) NULL,
	[id_marca] [bigint] NULL,
	[id_descuento] [bigint] NULL,
	[precio] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[proveedores]    Script Date: 2/10/2024 18:55:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[proveedores](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](255) NULL,
	[id_producto] [bigint] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[stock]    Script Date: 2/10/2024 18:55:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[stock](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[id_proveedor] [bigint] NULL,
	[id_producto] [bigint] NULL,
	[cantidad] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[sueldos]    Script Date: 2/10/2024 18:55:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[sueldos](
	[id_empleado] [bigint] NULL,
	[cantidad] [int] NULL,
	[horas_extras] [int] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tipo_pago]    Script Date: 2/10/2024 18:55:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tipo_pago](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[ventas]    Script Date: 2/10/2024 18:55:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ventas](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[num_factura] [int] NULL,
	[id_cliente] [bigint] NULL,
	[id_empleado] [bigint] NULL,
	[fecha_venta] [date] NULL,
	[total] [int] NULL,
	[id_tipo_pago] [bigint] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[detalle_venta]  WITH CHECK ADD FOREIGN KEY([id_producto])
REFERENCES [dbo].[productos] ([id])
GO
ALTER TABLE [dbo].[detalle_venta]  WITH CHECK ADD FOREIGN KEY([id_venta])
REFERENCES [dbo].[ventas] ([id])
GO
ALTER TABLE [dbo].[horarios_empleados]  WITH CHECK ADD FOREIGN KEY([id_empleado])
REFERENCES [dbo].[empleados] ([id])
GO
ALTER TABLE [dbo].[info_proveedores]  WITH CHECK ADD FOREIGN KEY([id_proveedores])
REFERENCES [dbo].[proveedores] ([id])
GO
ALTER TABLE [dbo].[pedidos]  WITH CHECK ADD FOREIGN KEY([id_productos])
REFERENCES [dbo].[productos] ([id])
GO
ALTER TABLE [dbo].[pedidos]  WITH CHECK ADD FOREIGN KEY([id_proveedor])
REFERENCES [dbo].[proveedores] ([id])
GO
ALTER TABLE [dbo].[productos]  WITH CHECK ADD FOREIGN KEY([id_descuento])
REFERENCES [dbo].[descuentos] ([id])
GO
ALTER TABLE [dbo].[productos]  WITH CHECK ADD FOREIGN KEY([id_marca])
REFERENCES [dbo].[marcas] ([id])
GO
ALTER TABLE [dbo].[proveedores]  WITH CHECK ADD FOREIGN KEY([id_producto])
REFERENCES [dbo].[productos] ([id])
GO
ALTER TABLE [dbo].[stock]  WITH CHECK ADD FOREIGN KEY([id_producto])
REFERENCES [dbo].[productos] ([id])
GO
ALTER TABLE [dbo].[stock]  WITH CHECK ADD FOREIGN KEY([id_proveedor])
REFERENCES [dbo].[proveedores] ([id])
GO
ALTER TABLE [dbo].[sueldos]  WITH CHECK ADD FOREIGN KEY([id_empleado])
REFERENCES [dbo].[empleados] ([id])
GO
ALTER TABLE [dbo].[ventas]  WITH CHECK ADD FOREIGN KEY([id_cliente])
REFERENCES [dbo].[clientes] ([id])
GO
ALTER TABLE [dbo].[ventas]  WITH CHECK ADD FOREIGN KEY([id_empleado])
REFERENCES [dbo].[empleados] ([id])
GO
ALTER TABLE [dbo].[ventas]  WITH CHECK ADD FOREIGN KEY([id_tipo_pago])
REFERENCES [dbo].[tipo_pago] ([id])
GO
USE [master]
GO
ALTER DATABASE [supermercado_cocos] SET  READ_WRITE 
GO
INSERT INTO marcas (nombre) VALUES
('Marca A'),
('Marca B'),
('Marca C'),
('Marca D'),
('Marca E');
INSERT INTO descuentos (nombre) VALUES
('10% de descuento'),
('20% de descuento'),
('30% de descuento'),
('50% de descuento'),
('Sin descuento');
INSERT INTO tipo_pago (nombre) VALUES
('Efectivo'),
('Tarjeta de Crédito'),
('Tarjeta de Débito'),
('Transferencia Bancaria'),
('PayPal');
INSERT INTO clientes (dni, apellido, email, telefono) VALUES
(12345678, 'González', 'gonzalez@example.com', 123456789),
(87654321, 'Martínez', 'martinez@example.com', 987654321),
(11223344, 'Rodríguez', 'rodriguez@example.com', 112233445),
(44332211, 'López', 'lopez@example.com', 443322110),
(55667788, 'Pérez', 'perez@example.com', 556677889);
INSERT INTO empleados (dni, nombre, direccion, contacto, cod_emp) VALUES
('12345678A', 'Juan Pérez', 'Calle Falsa 123', 'juan.perez@example.com', 101),
('87654321B', 'Ana López', 'Avenida Siempre Viva 742', 'ana.lopez@example.com', 102),
('11223344C', 'Luis García', 'Calle Luna 45', 'luis.garcia@example.com', 103),
('44332211D', 'María Fernández', 'Calle Sol 67', 'maria.fernandez@example.com', 104),
('55667788E', 'Carlos Sánchez', 'Avenida Estrella 89', 'carlos.sanchez@example.com', 105);
INSERT INTO productos (nombre, descripcion, id_marca, id_descuento, precio) VALUES
('Producto 1', 'Descripción 1', 1, 1, 100),
('Producto 2', 'Descripción 2', 2, 2, 200),
('Producto 3', 'Descripción 3', 3, 3, 300),
('Producto 4', 'Descripción 4', 4, 4, 400),
('Producto 5', 'Descripción 5', 5, 5, 500);
INSERT INTO proveedores (nombre, id_producto) VALUES
('Proveedor 1', 1),
('Proveedor 2', 2),
('Proveedor 3', 3),
('Proveedor 4', 4),
('Proveedor 5', 5);
INSERT INTO ventas (num_factura, id_cliente, id_empleado, fecha_venta, total, id_tipo_pago) VALUES
(1001, 1, 1, '2023-01-01', 1000, 1),
(1002, 2, 2, '2023-02-01', 2000, 2),
(1003, 3, 3, '2023-03-01', 3000, 3),
(1004, 4, 4, '2023-04-01', 4000, 4),
(1005, 5, 5, '2023-05-01', 5000, 5);
INSERT INTO detalle_venta (id_venta, id_producto, cant_producto) VALUES
(1, 1, 10),
(2, 2, 20),
(3, 3, 30),
(4, 4, 40),
(5, 5, 50);
INSERT INTO horarios_empleados (id_empleado, turno) VALUES
(1, 'Mañana'),
(2, 'Tarde'),
(3, 'Noche'),
(4, 'Mañana'),
(5, 'Tarde');
INSERT INTO info_proveedores (id_proveedores, direccion, telefono, ciudad, email) VALUES
(1, 'Calle Proveedor 1', 123456789, 'Ciudad 1', 'proveedor1@example.com'),
(2, 'Calle Proveedor 2', 987654321, 'Ciudad 2', 'proveedor2@example.com'),
(3, 'Calle Proveedor 3', 112233445, 'Ciudad 3', 'proveedor3@example.com'),
(4, 'Calle Proveedor 4', 443322110, 'Ciudad 4', 'proveedor4@example.com'),
(5, 'Calle Proveedor 5', 556677889, 'Ciudad 5', 'proveedor5@example.com');
INSERT INTO pedidos (id_productos, id_proveedor, estado, cantidad, fecha_entrega) VALUES
(1, 1, 'Pendiente', 100, '2023-06-01'),
(2, 2, 'Completado', 200, '2023-07-01'),
(3, 3, 'Cancelado', 300, '2023-08-01'),
(4, 4, 'Pendiente', 400, '2023-09-01'),
(5, 5, 'Completado', 500, '2023-10-01');
INSERT INTO stock (id_proveedor, id_producto, cantidad) VALUES
(1, 1, 1000),
(2, 2, 2000),
(3, 3, 3000),
(4, 4, 4000),
(5, 5, 5000);
INSERT INTO sueldos (id_empleado, cantidad, horas_extras) VALUES
(1, 1000, 10),
(2, 2000, 20),
(3, 3000, 30),
(4, 4000, 40),
(5, 5000, 50);