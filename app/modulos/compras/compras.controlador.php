<?php

class ComprasControlador
{
    public static function ctrGuardarCompra()
    {

        if (isset($_POST['btnGuardarCompra'])) {

            date_default_timezone_set('America/Mexico_city');
            $url = AppControlador::obtenerRutaBackend();


            $_POST['cps_cantidad'] = str_replace(",", "", $_POST['cps_cantidad']);
            $_POST['abs_monto'] = str_replace(",", "", $_POST['abs_monto']);
            $_POST['abs_adeudo'] = $_POST['cps_cantidad'] - $_POST['abs_monto'];

            $_POST['cps_fecha_pagado'] = null;
            $_POST['cps_estado_pagado'] = 0;



            if ($_POST['cps_tp'] == 'Contado' || $_POST['cps_cantidad'] == $_POST['abs_monto']) {
                if ($_POST['abs_adeudo'] != 0 && $_POST['cps_cantidad'] != $_POST['abs_monto']) {
                    AppControlador::msj('warning', 'Verfica los datos', 'El tipo de pago es de contado y el monto total es diferente de la cantidad introducida', '');
                    die();
                }

                $_POST['cps_fecha_pagado'] = date("Y-m-d H:i:s");
                $_POST['cps_estado_pagado'] = 1;
            }

            $_POST['cps_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];


            $crearCompra = ComprasModelo::mdlCrearCompra($_POST);

            if ($crearCompra) {
                $crearAbono = ComprasModelo::mdlCrearAbonoCompra(array(
                    'abs_compra' => $_POST['cps_folio'],
                    'abs_monto' => $_POST['abs_monto'],
                    'abs_fecha' => date("Y-m-d H:i:s"),
                    'abs_usuario_registro' => $_SESSION['session_usr']['usr_nombre'],
                    'abs_adeudo' => $_POST['abs_adeudo'],
                    'abs_mp' => $_POST['cps_mp'],

                ));
                if ($crearAbono) {
                    AppControlador::msj('success', 'Muy bien', 'Compra guardada', $url . 'listar-compras');
                }
            } else {
                AppControlador::msj('error', 'Ocurrio un error', 'Folio de compra repetido', '');
            }
        }
    }

    public static function ctrCrearProveedor($proveedor)
    {



        $crearProveedor = ComprasModelo::mdlCrearProveedor(array(
            'pvs_nombre' => $proveedor['pvs_nombre'],
            'pvs_telefono' => ""
        ));

        if ($crearProveedor) {
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

    public static function ctrLiquidarCompra($cps_folio)
    {
        $url = AppControlador::obtenerRutaBackend();
        date_default_timezone_set('America/Mexico_city');


        $detalleCompra = ComprasModelo::mdlConsultarCompra($cps_folio);
        $adeudo = ComprasModelo::mdlAdeudoCompra($cps_folio);

        //echo '<pre>', print_r($adeudo), '</pre>';
        //echo '<pre>', print_r($detalleCompra), '</pre>';

        $datosCompra = array(
            'cps_fecha_pagado' => date("Y-m-d H:i:s"),
            'cps_estado_pagado' => 1,
            'abs_compra' => $cps_folio,
            'abs_monto' => $adeudo['abs_adeudo'],
            'abs_fecha' => date("Y-m-d H:i:s"),
            'abs_usuario_registro' => $_SESSION['session_usr']['usr_nombre'],
            'abs_adeudo' => 0.00,
            'abs_mp' => $detalleCompra['cps_mp'],

        );
        $actualizarCompra = ComprasModelo::mdlActualizarCompraAbono($datosCompra);
        if ($actualizarCompra) {
            $crearAbono = ComprasModelo::mdlCrearAbonoCompra($datosCompra);
            if ($crearAbono) {
                return array(
                    'status' => true,
                    'mensaje' => 'Compra liquidada',
                    'pagina' => 'listar-compras'
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'La compra se liquido, pero no registro el abono',
                    'pagina' => 'listar-compras'
                );
            }
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Ocurrio un error, intente de nuevo',
                'pagina' => 'listar-compras'
            );
        }
    }
}
