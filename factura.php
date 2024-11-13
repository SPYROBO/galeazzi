<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/factura.css">
    <title>Factura de Compra</title>
</head>
<body>
    <?php if (isset($_SESSION['dic_ticket'])){
        $array = $_SESSION['dic_ticket'];
        end($array);
        $datos_cli = key($array);
        $precio_total = 0;
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $metodo_pago = "";
        if($array[$datos_cli][1] == 1){
            $metodo_pago= "Tarjeta";
        }
        elseif($array[$datos_cli][1] == 2){
            $metodo_pago= "Mercado Pago";
        }
        else{
            $metodo_pago= "Efectivo";
        }
    echo '<div class="invoice">
        <div class="header">
            <h1>Cocos Supermarket</h1>
            <h3>Factura de Compra</h3>
        </div>
        <table class="details">
            <tr>
                <td><strong>DNI del Cliente:</strong> '.$array[$datos_cli][0].'</td>
                <td><strong>Fecha:</strong> ' . date("Y-m-d") . '</td>
            </tr>
            <tr>
                <td><strong>Metodo de pago:</strong> '. $metodo_pago .'</td>
                <td><strong>Hora:</strong> '.date("H:i:s A").'</td>
            </tr>
        </table>
        <table class="items">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody> '?>
            <?php for( $i = 0; $i < count($array)-1; $i++ ){
                echo'<tr>
                    <td>'.$array[$i]['nombre'].'</td>
                    <td>'.$array[$i]['cantidad'].'</td>
                    <td> $'.$array[$i]['precio'].'</td>
                    <td> %'.$array[$i]['descuento'].'</td>
                    <td> $'.$array[$i]['precio_final'].'</td>
                </tr>';
                $precio_total += $array[$i]['precio_final'];
            }
            echo '</tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="total">Total a Pagar:</td>
                    <td class="total">$'.$precio_total.'</td>
                </tr>
            </tfoot>
        </table>
        <div class="footer">
            <p>Gracias por su compra!</p>
            <p>Contacto: cocosSupermarket@gmail.com | Tel: 11 5435-9234</p>
        </div>
    </div>'; }
    
    ?>
    <?php unset($_SESSION['dic_ticket']); ?>
</body>
</html>
