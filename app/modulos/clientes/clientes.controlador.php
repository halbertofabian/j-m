
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
class ClientesControlador
{
    public function ctrAgregarClientes()
    {
        if (isset($_POST['btnAgregarCliente'])) {
            //var_dump($_POST);
            $direccion = array(
                'cts_dir_calle' => $_POST['cts_dir_calle'],
                'cts_dir_ext' => $_POST['cts_dir_ext'],
                'cts_dir_int' => $_POST['cts_dir_int'],
                'cts_dir_cp' => $_POST['cts_dir_cp'],
                'cts_dir_col' => $_POST['cts_dir_col'],
                'cts_dir_mun' => $_POST['cts_dir_mun'],
                'cts_dir_estado' => $_POST['cts_dir_estado'],
                'cts_dir_pais' => $_POST['cts_dir_pais']
            );

            $_POST['cts_direccion'] = json_encode($direccion, true);

            $crearClientes = ClientesModelo::mdlAgregarClientes($_POST);
            if (isset($_POST['method']) && $_POST['method'] == 'AJAX') {
                if ($crearClientes) {
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
            } else {
                if ($crearClientes) {
                    AppControlador::msj('success', 'Muy bien', 'cliente creado con éxito', './listar-clientes');
                } else {
                    AppControlador::msj('error', 'Error', 'Algo salio mal, intente de nuevo');
                }
            }
        }
    }
 
    public function ctrActualizarClientes()
    {
    }
    public function ctrMostrarClientes()
    {
    }
    public function ctrEliminarClientes()
    {
    }
}
