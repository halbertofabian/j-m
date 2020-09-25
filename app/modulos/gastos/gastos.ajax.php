<?php

session_start();
include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/gastos/gastos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/gastos/gastos.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class GastosAjax
{
    public $gts_nombre;
    public $gts_presupuesto;

    

    public function ajaxCrearCategoria()
    {
        $categoria = array(
            'gts_nombre' => $this->gts_nombre,
            'gts_presupuesto' => $this->gts_presupuesto
        );

        $res = GastosControlador::ctrCrearCategoria($categoria);

        echo json_encode($res);
    }
    public function ajaxListarCategorias()
    {

        $res = GastosModelo::mdlConsultarCategorias();

        echo json_encode($res);
    }
}


if (isset($_POST['btnCrearCategoria'])) {
    $crearCategoria = new GastosAjax();
    $crearCategoria->gts_nombre = $_POST['gts_nombre'];
    $crearCategoria->gts_presupuesto = $_POST['gts_presupuesto'];
    $crearCategoria->ajaxCrearCategoria();
}

if (isset($_POST['btnListarCategorias'])) {
    $listarCategorias = new GastosAjax();
    $listarCategorias->ajaxListarCategorias();
}
