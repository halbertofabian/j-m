<?php
class VentasControlador
{
    public static function ctrGuardarVenta()
    {

        if (isset($_POST['btnGuardarVenta'])) {

            date_default_timezone_set('America/Mexico_city');

            $_POST['vts_cantidad'] = str_replace(",", "", $_POST['vts_cantidad']);
            $_POST['abs_monto'] = str_replace(",", "", $_POST['abs_monto']);
            $_POST['abs_adeudo'] = $_POST['vts_cantidad'] - $_POST['abs_monto'];

            $_POST['vts_fecha_pagado'] = null;
            $_POST['vts_estado_pagado'] = 0;



            if ($_POST['vts_tp'] == 'Contado') {
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
                    'abs_adeudo' => $_POST['abs_adeudo'],

                ));
                var_dump($crearAbono);
                if ($crearAbono) {
                    AppControlador::msj('success', 'Muy bien', 'Venta guardada', 'listar-ventas');
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
}
