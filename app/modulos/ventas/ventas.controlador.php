<?php
class VentasControlador
{
    public static function ctrGuardarVenta()
    {
        
        if (isset($_POST['btnGuardarVenta'])) {

            date_default_timezone_set('America/Mexico_city');
            $url = AppControlador::obtenerRutaBackend();


            $_POST['vts_cantidad'] = str_replace(",", "", $_POST['vts_cantidad']);
            $_POST['abs_monto'] = str_replace(",", "", $_POST['abs_monto']);
            $_POST['abs_adeudo'] = $_POST['vts_cantidad'] - $_POST['abs_monto'];

            $_POST['vts_fecha_pagado'] = null;
            $_POST['vts_estado_pagado'] = 0;



            if ($_POST['vts_tp'] == 'Contado' || $_POST['vts_cantidad'] == $_POST['abs_monto']) {
                if ($_POST['abs_adeudo'] != 0 && $_POST['vts_cantidad'] != $_POST['abs_monto']) {
                    AppControlador::msj('warning', 'Verfica los datos', 'El tipo de pago es de contado y el monto total es diferente de la cantidad introducida', '');
                    die();
                }

                $_POST['vts_fecha_pagado'] = date("Y-m-d H:i:s");
                $_POST['vts_estado_pagado'] = 1;
            }

            $_POST['vts_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];


            $crearVenta = VentasModelo::mdlCrearVenta($_POST);
            if ($crearVenta) {
                $crearAbono = VentasModelo::mdlCrearAbono(array(
                    'abs_venta' => $_POST['vts_factura'],
                    'abs_monto' => $_POST['abs_monto'],
                    'abs_fecha' => date("Y-m-d H:i:s"),
                    'abs_usuario_registro' => $_SESSION['session_usr']['usr_nombre'],
                    'abs_adeudo' => $_POST['abs_adeudo'],
                    'abs_mp' => $_POST['vts_mp'],

                ));
                if ($crearAbono) {
                    AppControlador::msj('success', 'Muy bien', 'Venta guardada', $url . 'abonos/' . $_POST['vts_factura']);
                }
            } else {
                AppControlador::msj('error', 'Ocurrio un error', 'Número de venta repetido', '');
            }
        }
    }

    public static function ctrCrearVendedor($vendedor)
    {



        $crearVendedor = VentasModelo::mdlCrearVendedor(array(
            'usr_nombre' => $vendedor['usr_nombre'],
            'usr_rol' => 1
        ));

        if ($crearVendedor) {
            return array(
                'status' => true,
                'mensaje' => 'Registro creado con éxito'
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Ocurrio un error, es probable que ya exista este registro'
            );
        }
    }

    public static function ctrCrearCliente($cliente)
    {



        $crearCliente = VentasModelo::mdlCrearCliente(array(
            'cts_nombre' => $cliente['cts_nombre']
        ));

        if ($crearCliente) {
            return array(
                'status' => true,
                'mensaje' => 'Registro creado con éxito'
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Ocurrio un error, es probable que ya exista este registro'
            );
        }
    }

    public static function ctrCrearAbono()
    {
        $url = AppControlador::obtenerRutaBackend();

        $_POST['abs_monto'] = str_replace(",", "", $_POST['abs_monto']);

        $abonos =  VentasModelo::mdlConsultarAbonosVentas($_POST['abs_venta']);
        $c = sizeof($abonos);


        $abs_adeudo_ant = $abonos[$c - 1]['abs_adeudo'];
        $abs_adeudo_cal = $abonos[$c - 1]['abs_adeudo'] - $_POST['abs_monto'];

        // echo $abs_adeudo_cal;

        if ($_POST['abs_monto'] <= 0) {

            return array(
                'status' => false,
                'mensaje' => 'El abono debe de ser una cantidad mayor a 0'
            );
        }

        if ($_POST['abs_monto'] > $abonos[$c - 1]['abs_adeudo'] || $abs_adeudo_cal < 0) {
            return array(
                'status' => false,
                'mensaje' => 'El abono debe de estar considerado en el rango del adeudo es decir de 1.00 a ' . number_format($abonos[$c - 1]['abs_adeudo'])
            );
        }

        date_default_timezone_set('America/Mexico_city');


        $banderaAbono = true;
        if ($abs_adeudo_cal == 0) {
            // Actualizar a pagado con fecha
            $actualizarAbono = VentasModelo::mdlActualizarVentaAbono(array(
                'vts_fecha_pagado' => date("Y-m-d H:i:s"),
                'vts_estado_pagado' => 1,
                'vts_factura' => $_POST['abs_venta']

            ));
            $banderaAbono = $actualizarAbono;
        }

        if ($banderaAbono) {
            $crearAbono = VentasModelo::mdlCrearAbono(array(
                'abs_venta' => $_POST['abs_venta'],
                'abs_monto' => $_POST['abs_monto'],
                'abs_fecha' => date("Y-m-d H:i:s"),
                'abs_usuario_registro' => $_SESSION['session_usr']['usr_nombre'],
                'abs_adeudo' => $abs_adeudo_cal,
                'abs_mp' => $_POST['abs_mp']

            ));
            if ($crearAbono) {
                return array(
                    'status' => true,
                    'mensaje' => 'Abono registrado con éxito',
                    'pagina' => $url . 'abonos/' . $_POST['abs_venta']
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'Abono no registrado'
                );
            }
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Ocurrio un error no esperado, verifique su conexión a internet'
            );
        }
        //echo "<pre>", print_r($abonos), "</pre>";
    }
}
