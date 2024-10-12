<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .invoice {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }

        .details, .items {
            width: 100%;
            margin-bottom: 20px;
        }

        .details td, .items th, .items td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .details {
            margin-bottom: 30px;
        }

        .items th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
            text-align: right;
        }

        .footer {
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="header">
            <h1>Factura de Compra</h1>
        </div>
        <table class="details">
            <tr>
                <td><strong>Nombre del Cliente:</strong> Juan Pérez</td>
                <td><strong>Fecha:</strong> 08/10/2024</td>
            </tr>
            <tr>
                <td><strong>Número de Factura:</strong> 001234</td>
                <td></td>
            </tr>
        </table>
        <table class="items">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Producto A</td>
                    <td>2</td>
                    <td>$10.00</td>
                    <td>$20.00</td>
                </tr>
                <tr>
                    <td>Producto B</td>
                    <td>1</td>
                    <td>$15.00</td>
                    <td>$15.00</td>
                </tr>
                <tr>
                    <td>Producto C</td>
                    <td>3</td>
                    <td>$5.00</td>
                    <td>$15.00</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="total">Subtotal:</td>
                    <td class="total">$50.00</td>
                </tr>
                <tr>
                    <td colspan="3" class="total">Descuento:</td>
                    <td class="total">-$5.00</td>
                </tr>
                <tr>
                    <td colspan="3" class="total">Total a Pagar:</td>
                    <td class="total">$45.00</td>
                </tr>
            </tfoot>
        </table>
        <div class="footer">
            <p>Gracias por su compra!</p>
            <p>Contacto: info@ejemplo.com | Tel: 123-456-7890</p>
        </div>
    </div>
</body>
</html>
