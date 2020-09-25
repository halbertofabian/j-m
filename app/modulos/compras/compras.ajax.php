<?php

session_start();
include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/compras/compras.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/compras/compras.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class ComprasAjax
{
    public $pvs_nombre;

    public function ajaxCrearProveedor()
    {
        $proveedor = array('pvs_nombre' => $this->pvs_nombre);

        $res = ComprasControlador::ctrCrearProveedor($proveedor);

        echo json_encode($res);
    }
    public function ajaxCrearListaProveedores()
    {

        $res = ComprasModelo::mdlConsultarProveedores();

        echo json_encode($res);
    }
}


if (isset($_POST['btnCrearProveedor'])) {
    $crearVendedor = new ComprasAjax();
    $crearVendedor->pvs_nombre = $_POST['pvs_nombre'];
    $crearVendedor->ajaxCrearProveedor();
}

if (isset($_POST['btnListarProveedores'])) {
    $listaProveedores = new ComprasAjax();
    $listaProveedores->ajaxCrearListaProveedores();
}
