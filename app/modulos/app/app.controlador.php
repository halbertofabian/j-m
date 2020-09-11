<?php
class AppControlador
{
    public static function obtenerRutaBackend()
    {
        return 'http://localhost/j&m/';
    }
    public  function iniciarApp()
    {
        $app = new AppControlador();
        $url = AppControlador::obtenerRutaBackend();
        require_once 'app/modulos/app/app.php';
    }

    public function obtenerPagina($rutaPagina, $rutas = "")
    {
        $app = new AppControlador();
        $url = AppControlador::obtenerRutaBackend();
        include_once 'app/paginas/' . $rutaPagina . '.php';
    }

    public function obtenerComponente($componente, $rutas = "", $label = "")
    {
        $app = new AppControlador();
        $url = AppControlador::obtenerRutaBackend();
        include_once 'app/componentes/' . $componente . '.php';
    }

    public static function msj($tipo, $titulo, $mensaje, $pagina = "")
    {

        if ($pagina == "") {
            echo
            
                '
            <script>    
            swal({
                title: "' . $titulo . '",
                text: "' . $mensaje . '",
                icon: "' . $tipo . '",
                buttons: ["Cancelar","Continuar"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.history.back();
                } else {
                    window.history.back();
                }
            });
            </script> 
        ';
        } else {
            echo
                '
            <script> 
            swal({
                title: "' . $titulo . '",
                text: "' . $mensaje . '",
                icon: "' . $tipo . '",
                buttons: ["Cancelar","Continuar"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    location.href = "' . $pagina . '"
                } else {
                    location.href = "' . $pagina . '"
                }
            });
            </script> 
        ';
        }
    }
}
