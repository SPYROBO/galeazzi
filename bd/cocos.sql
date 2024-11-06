USE [master]
GO
/****** Object:  Database [supermercado_cocos]    Script Date: 12/10/2024 20:11:37 ******/
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
/****** Object:  Table [dbo].[descuentos]    Script Date: 12/10/2024 20:11:37 ******/
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
/****** Object:  Table [dbo].[detalle_venta]    Script Date: 12/10/2024 20:11:37 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[detalle_venta](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[id_venta] [int] NULL,
	[id_producto] [int] NULL,
	[cant_producto] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[empleados]    Script Date: 12/10/2024 20:11:37 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[empleados](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[dni] [int] NULL,
	[nombre] [varchar](255) NULL,
	[direccion] [varchar](255) NULL,
	[contacto] [varchar](255) NULL,
	[cod_emp] [int] NULL,
	[contrasena] [varchar](255) NULL,
	[correo] [varchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[horarios_empleados]    Script Date: 12/10/2024 20:11:37 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[horarios_empleados](
	[id_empleado] [bigint] NULL,
	[turno] [varchar](255) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[info_proveedores]    Script Date: 12/10/2024 20:11:37 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[info_proveedores](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](255) NULL,
	[direccion] [varchar](255) NULL,
	[telefono] [int] NULL,
	[ciudad] [varchar](255) NULL,
	[email] [varchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[marcas]    Script Date: 12/10/2024 20:11:37 ******/
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
/****** Object:  Table [dbo].[pedidos]    Script Date: 12/10/2024 20:11:37 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[pedidos](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[id_productos] [int] NULL,
	[id_proveedor] [int] NULL,
	[estado] [varchar](255) NULL,
	[cantidad] [int] NULL,
	[fecha_entrega] [date] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[productos]    Script Date: 12/10/2024 20:11:37 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[productos](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](255) NULL,
	[descripcion] [varchar](255) NULL,
	[id_marca] [int] NULL,
	[id_descuento] [int] NULL,
	[precio] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[proveedores]    Script Date: 12/10/2024 20:11:37 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[proveedores](
	[id_proveedor] [int] NOT NULL,
	[id_producto] [int] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[stock]    Script Date: 12/10/2024 20:11:37 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[stock](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[id_proveedor] [int] NULL,
	[id_producto] [int] NULL,
	[cantidad] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[sueldos]    Script Date: 12/10/2024 20:11:37 ******/
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
/****** Object:  Table [dbo].[tipo_pago]    Script Date: 12/10/2024 20:11:37 ******/
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
/****** Object:  Table [dbo].[ventas]    Script Date: 12/10/2024 20:11:37 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ventas](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[num_factura] [int] NULL,
	[id_cliente] [int] NULL,
	[id_empleado] [int] NULL,
	[fecha_venta] [date] NULL,
	[total] [int] NULL,
	[id_tipo_pago] [bigint] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

-- Cambiar las restricciones de claves foráneas a WITH CHECK
ALTER TABLE [dbo].[detalle_venta] WITH CHECK ADD CONSTRAINT [FK_detalle_venta_producto] FOREIGN KEY([id_producto])
REFERENCES [dbo].[productos] ([id]);
GO
ALTER TABLE [dbo].[detalle_venta] CHECK CONSTRAINT [FK_detalle_venta_producto];
GO

ALTER TABLE [dbo].[detalle_venta] WITH CHECK ADD CONSTRAINT [FK_detalle_venta_venta] FOREIGN KEY([id_venta])
REFERENCES [dbo].[ventas] ([id]);
GO
ALTER TABLE [dbo].[detalle_venta] CHECK CONSTRAINT [FK_detalle_venta_venta];
GO

ALTER TABLE [dbo].[horarios_empleados] WITH CHECK ADD CONSTRAINT [FK_horarios_empleados_empleado] FOREIGN KEY([id_empleado])
REFERENCES [dbo].[empleados] ([id]);
GO
ALTER TABLE [dbo].[horarios_empleados] CHECK CONSTRAINT [FK_horarios_empleados_empleado];
GO

ALTER TABLE [dbo].[pedidos] WITH CHECK ADD CONSTRAINT [FK_pedidos_productos] FOREIGN KEY([id_productos])
REFERENCES [dbo].[productos] ([id]);
GO
ALTER TABLE [dbo].[pedidos] CHECK CONSTRAINT [FK_pedidos_productos];
GO

ALTER TABLE [dbo].[pedidos] WITH CHECK ADD CONSTRAINT [FK_pedidos_proveedor] FOREIGN KEY([id_proveedor])
REFERENCES [dbo].[info_proveedores] ([id]);
GO
ALTER TABLE [dbo].[pedidos] CHECK CONSTRAINT [FK_pedidos_proveedor];
GO

ALTER TABLE [dbo].[productos] WITH CHECK ADD CONSTRAINT [FK_productos_descuento] FOREIGN KEY([id_descuento])
REFERENCES [dbo].[descuentos] ([id]);
GO
ALTER TABLE [dbo].[productos] CHECK CONSTRAINT [FK_productos_descuento];
GO

ALTER TABLE [dbo].[productos] WITH CHECK ADD CONSTRAINT [FK_productos_marca] FOREIGN KEY([id_marca])
REFERENCES [dbo].[marcas] ([id]);
GO
ALTER TABLE [dbo].[productos] CHECK CONSTRAINT [FK_productos_marca];
GO

ALTER TABLE [dbo].[proveedores] WITH CHECK ADD CONSTRAINT [FK_proveedores_producto] FOREIGN KEY([id_producto])
REFERENCES [dbo].[productos] ([id]);
GO
ALTER TABLE [dbo].[proveedores] CHECK CONSTRAINT [FK_proveedores_producto];
