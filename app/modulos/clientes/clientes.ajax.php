
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 28/09/2020 21:08
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

session_start();
include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/clientes/clientes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/clientes/clientes.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class ClientesAjax
{
    public function ajaxCrearCliente()
    {
        //var_dump($_POST);
        $res = new  ClientesControlador();
        echo json_encode($res->ctrAgregarClientes());
    }
    public function ajaxCrearListaClientes()
    {
        $res = ClientesModelo::mdlMostrarClientes();
        echo json_encode($res, true);
    }
}

if (isset($_POST['btnListarClientes'])) {
    $listaClientes = new ClientesAjax();
    $listaClientes->ajaxCrearListaClientes();
}
if (isset($_POST['btnAgregarCliente'])) {
    $crearCliente = new ClientesAjax();
    $crearCliente->ajaxCrearCliente();
}
