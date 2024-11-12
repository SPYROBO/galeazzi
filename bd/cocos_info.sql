INSERT INTO dbo.descuentos (nombre) 
VALUES 
(10),  
(20), 
(30), (40), (50), (60), (70), (80), (90), (100);  

INSERT INTO dbo.detalle_venta (id_venta, id_producto, cant_producto) 
VALUES 
(1, 1, 2), 
(1, 2, 3);  

INSERT INTO dbo.marcas (nombre) 
VALUES 
('Coca-Cola'),
('Pepsi'),
('Arcor'),
('Ledesma'),
('La Serenísima'),
('Baggio');


INSERT INTO dbo.info_proveedores (nombre, direccion, telefono, ciudad, email) 
VALUES 
('Coca-Cola FEMSA Argentina', 'Av. Santa Fe 3456', 1136677, 'Buenos Aires', 'contacto@cokefemsa.com.ar'), -- Coca-Cola FEMSA
('PepsiCo Argentina', 'Calle Cerrito 600', 113331, 'Buenos Aires', 'atencionclientes@pepsico.com.ar'), -- PepsiCo Argentina
('Arcor S.A.I.C.', 'Av. Rivadavia 2400', 3514312, 'Córdoba', 'atencion@arcor.com'), -- Arcor
('Ledesma S.A.A.I.', 'Calle 25 de Mayo 450', 3804600, 'San Salvador de Jujuy', 'info@ledesma.com.ar'), -- Ledesma
('La Serenísima', 'Calle 12 de Octubre 3500', 1135233, 'Buenos Aires', 'contacto@serenisima.com.ar'), -- La Serenísima
('Baggio S.A.', 'Av. del Libertador 2100', 114800, 'Buenos Aires', 'contacto@baggio.com.ar'); -- Baggio

INSERT INTO dbo.productos (nombre, descripcion, id_marca, id_descuento, precio) 
VALUES 
('Coca-Cola 500ml', 'Bebida gaseosa', 1, 1, 90),   -- Coca-Cola Argentina
('Pepsi 500ml', 'Bebida gaseosa', 2, 2, 85),      -- PepsiCo Argentina
('Galletitas Chokolinas', 'Galletas de chocolate', 3, 3, 50),   -- Arcor
('Azúcar Ledesma 1kg', 'Azúcar de caña', 4, 4, 65),   -- Ledesma
('Leche La Serenísima 1L', 'Leche entera', 5, 5, 60),  -- La Serenísima
('Jugo Baggio 1L', 'Jugo de naranja', 6, 6, 55);    -- Baggio

INSERT INTO dbo.proveedores (id_proveedor, id_producto) 
VALUES 
(4, 1),  
(5, 2),  
(6, 3),  
(7, 4),  
(8, 5),  
(9, 6);  

INSERT INTO dbo.stock (id_proveedor, id_producto, cantidad) 
VALUES 
(1, 1, 500),  
(2, 2, 400),  
(3, 3, 300), 
(4, 4, 600),  
(5, 5, 800),  
(6, 6, 700);  
