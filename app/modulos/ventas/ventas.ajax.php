<?php
require_once 'ventas.modelo.php';
require_once 'ventas.controlador.php';

class VentasAjax
{
    public $usr_nombre;
    public $cts_nombre;

    public function ajaxCrearVendedor()
    {
        $vendedor = array('usr_nombre' => $this->usr_nombre);

        $res = VentasControlador::ctrCrearVendedor($vendedor);

        echo json_encode($res);
    }
    public function ajaxCrearCliente()
    {
        $cliente = array('cts_nombre' => $this->cts_nombre);

        $res = VentasControlador::ctrCrearCliente($cliente);

        echo json_encode($res);
    }

    public function ajaxCrearListaVendedores()
    {
        
        $res = VentasModelo::mdlConsultarVendedores();

        echo json_encode($res);
    }

    public function ajaxCrearListaClientes()
    {
        
        $res = VentasModelo::mdlConsultarClientes();

        echo json_encode($res);
    }
}

if (isset($_POST['btnCrearVendedor'])) {
    $crearVendedor = new VentasAjax();
    $crearVendedor->usr_nombre = $_POST['usr_nombre'];
    $crearVendedor->ajaxCrearVendedor();
}

if (isset($_POST['btnCrearCliente'])) {
    $crearCliente = new VentasAjax();
    $crearCliente->cts_nombre = $_POST['cts_nombre'];
    $crearCliente->ajaxCrearCliente();
}

if (isset($_POST['btnListarVendedores'])) {
    $listaVendedores = new VentasAjax();
    $listaVendedores->ajaxCrearListaVendedores();
}

if (isset($_POST['btnListarClientes'])) {
    $listaClientes = new VentasAjax();
    $listaClientes->ajaxCrearListaClientes();
}
