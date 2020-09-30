<?php
//var_dump($rutas);
if (isset($rutas[1]) && $rutas[1] == 'por-cobrar') :
    $app->obtenerComponente('encabezado-nivel-2', '', 'Cuentas por cobrar', array(['ruta' => 'reportes', 'label' => 'reportes']));

?>
    <div class="container">
        <form method="post" id="formCuentasCobrar">
            <div class="row">
                <div class="form-group col-12 col-md-4">
                    <label for="vts_vendedor">Nombre del vendedor</label>
                    <select name="vts_vendedor" id="vts_vendedor" class="form-control select2">
                        <option value="">Todos los vendedores</option>
                    </select>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="vts_cliente">Nombre del cliente</label>
                    <select name="vts_cliente" id="vts_cliente" class="form-control select2">
                        <option value="">Todos los clientes</option>
                    </select>
                </div>
                <div class="form-group col-md-4 col-12">
                    <label for="vts_factura">Número de factura / remisión</label>
                    <input type="text" name="vts_factura" id="vts_factura" class="form-control" placeholder="Número de factura / remisión">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary float-right">Buscar cuenta</button>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-12 text-center div-load">
                
            </div>
        </div>
        <div class="row mt-3" id="divCuentasCobrar">

        </div>

    </div>

<?php elseif (isset($rutas[1]) && $rutas[1] == '') : ?>

<?php endif; ?>