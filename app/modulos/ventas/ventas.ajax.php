<?php
session_start();
include_once '../../../config.php';

require_once DOCUMENT_ROOT .'app/modulos/ventas/ventas.modelo.php';
require_once DOCUMENT_ROOT .'app/modulos/ventas/ventas.controlador.php';
require_once DOCUMENT_ROOT .'app/modulos/app/app.controlador.php';


class VentasAjax
{
    public $usr_nombre;
    public $cts_nombre;
    public $vts_factura;

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

    public function ajaxListarAbonos()
    {
        
        $abonos = VentasModelo::mdlConsultarAbonosVentas($this->vts_factura);
        // echo "<pre>", print_r($abonos), "</pre>";
        $html = "";
        foreach ($abonos as $key => $abs) {
            $html .=
                '
                <tr>
                    <td style="width: 10px;">' . $abs['abs_id'] . '</td>
                    <td>' . $abs['abs_usuario_registro'] . '</td>
                    <td>' . number_format($abs['abs_monto'], 2) . '</td>
                    <td>' . $abs['abs_fecha'] . '</td>
                    <td>' . number_format($abs['abs_adeudo'], 2) . '</td>
                </tr>

            ';
        }
        echo $html;
    }

    public function ajaxGuardarAbonos()
    {

        $crearAbono = VentasControlador::ctrCrearAbono();
        echo json_encode($crearAbono, true);
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

if (isset($_POST['btnListarAbonos'])) {
    $ListarAbonos = new VentasAjax();
    $ListarAbonos->vts_factura = $_POST['vts_factura'];
    $ListarAbonos->ajaxListarAbonos();
}

if (isset($_POST['btnGuardarAbono'])) {
    $guardarAbono = new VentasAjax();
    $guardarAbono->ajaxGuardarAbonos();
}

