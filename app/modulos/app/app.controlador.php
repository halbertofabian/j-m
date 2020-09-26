<?php
class AppControlador
{
    public static function obtenerRutaBackend()
    {
        return HTTP_HOST;
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

    public function obtenerComponente($componente, $rutas = "", $label = "", $paginas = "")
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
                    buttons: [false,"Continuar"],
                    dangerMode: true,
                    closeOnClickOutside: false,

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
                    buttons: [false,"Continuar"],
                    dangerMode: true,
                    closeOnClickOutside: false,
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
