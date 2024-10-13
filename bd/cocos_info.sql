insert into
  clientes (dni, apellido, email, telefono)
values
  (12345678, 'González', 'gonzalez@ejemplo.com', 123456789 ),
  (87654321, 'Martínez', 'martinez@ejemplo.com', 987654321 ),
  (11223344, 'Pérez', 'perez@ejemplo.com', 112233445),
  (44332211, 'López', 'lopez@ejemplo.com', 443322110),
  (55667788, 'García', 'garcia@ejemplo.com', 556677889
  );
  insert into
  descuentos (nombre)
values
  ('10% de Descuento'),
  ('2x1 en Productos'),
  ('20% de Descuento'),
  ('Envío Gratis'),
  ('5% de Descuento');
  insert into
  empleados ( dni, nombre, direccion, contacto, cod_emp, contrasena, correo )
values
  (
    12345678,
    'Juan Pérez',
    'Calle Principal 123',
    '123-456-7890',
    101,
    'contrasena123',
    'juan.perez@ejemplo.com'
  ),
  (
    87654321,
    'María López',
    'Calle Olmo 456',
    '987-654-3210',
    102,
    'contrasena456',
    'maria.lopez@ejemplo.com'
  ),
  (
    11223344,
    'Carlos García',
    'Calle Roble 789',
    '456-789-0123',
    103,
    'contrasena789',
    'carlos.garcia@ejemplo.com'
  ),
  (
    44332211,
    'Ana Martínez',
    'Calle Pino 321',
    '654-321-0987',
    104,
    'contrasena321',
    'ana.martinez@ejemplo.com'
  ),
  (
    55667788,
    'Luis Rodríguez',
    'Calle Arce 654',
    '321-654-9870',
    105,
    'contrasena654',
    'luis.rodriguez@ejemplo.com'
  );
  insert into
  marcas (nombre)
values
  ('Marca A'),
  ('Marca B'),
  ('Marca C'),
  ('Marca D'),
  ('Marca E');
  insert into
  tipo_pago (nombre)
values
  ('Tarjeta de Crédito'),
  ('Tarjeta de Débito'),
  ('Efectivo'),
  ('Transferencia Bancaria'),
  ('PayPal');
  insert into
  info_proveedores (nombre, direccion, telefono, ciudad, email)
values
  (
    'Proveedor A',
    'Calle Falsa 123',
    123456789,
    'Ciudad A',
    'contacto@proveedora.com'
  ),
  (
    'Proveedor B',
    'Avenida Siempre Viva 742',
    987654321,
    'Ciudad B',
    'contacto@proveedorb.com'
  ),
  (
    'Proveedor C',
    'Calle Luna 456',
    112233445,
    'Ciudad C',
    'contacto@proveedorc.com'
  ),
  (
    'Proveedor D',
    'Calle Sol 789',
    443322110,
    'Ciudad D',
    'contacto@proveedord.com'
  ),
  (
    'Proveedor E',
    'Calle Estrella 321',
    556677889,
    'Ciudad E',
    'contacto@proveedore.com'
  );
  insert into
  proveedores (id_proveedor, id_producto)
values
  (1, 1),
  (2, 2),
  (3, 3),
  (4, 4),
  (5, 5);
  insert into
  productos (
    nombre,
    descripcion,
    id_marca,
    id_descuento,
    precio
  )
values
  (
    'Producto 1',
    'Descripción del producto 1',
    1,
    1,
    100
  ),
  (
    'Producto 2',
    'Descripción del producto 2',
    2,
    2,
    200
  ),
  (
    'Producto 3',
    'Descripción del producto 3',
    3,
    3,
    300
  ),
  (
    'Producto 4',
    'Descripción del producto 4',
    4,
    4,
    400
  ),
  (
    'Producto 5',
    'Descripción del producto 5',
    5,
    5,
    500
  );