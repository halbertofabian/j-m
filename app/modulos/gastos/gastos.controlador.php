<?php

class GastosControlador
{
    public static function ctrCrearCategoria($categoria)
    {



        $crearCategoria = GastosModelo::mdlCrearCategoria(array(
            'gts_nombre' => $categoria['gts_nombre'],
            'gts_presupuesto' => str_replace(",", "", $categoria['gts_presupuesto'])
        ));


        if ($crearCategoria) {
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

    public function ctrCrearGasto()
    {
        if (isset($_POST['btnGuardarGasto'])) {

            $_POST['tgts_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['tgts_cantidad'] = str_replace(",", "", $_POST['tgts_cantidad']);


            $crearGasto = GastosModelo::mdlCrearGasto($_POST);

            if ($crearGasto) {
                AppControlador::msj('success', 'Muy bien', 'Gastos guardado', './listar-gastos');
            } else {
                AppControlador::msj('error', 'Ocurrio un error', 'No se pudo guardar el gasto, intente de nuevo', '');
            }
        }
    }
}
