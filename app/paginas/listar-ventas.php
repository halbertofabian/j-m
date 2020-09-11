<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $url ?>">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de ventas</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12">

            <table class="table tablaVentas table-light tablas table-bordered table-striped dt-responsive">
                <thead>
                    <tr>
                        <th>#Número de factura</th>
                        <th>Vendedor</th>
                        <th>Cliente</th>
                        <th>Fecha de venta</th>
                        <th>Cantidad</th>
                        <th>Tipo de pago</th>
                        <th>Fecha pagado</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ventas = VentasModelo::mdlConsultarVenta();
                    foreach ($ventas as $key => $vts) :
                        $estado_vts = $vts['vts_estado_pagado'] == 1 ? 'PAGADO' : '';
                    ?>
                        <tr>
                            <td><?php echo $vts['vts_factura'] ?></td>
                            <td><?php echo $vts['usr_nombre'] ?></td>
                            <td><?php echo $vts['cts_nombre'] ?></td>
                            <td><?php echo $vts['vts_fecha_venta'] ?></td>
                            <td><?php echo $vts['vts_cantidad'] ?></td>
                            <td><?php echo $vts['vts_tp'] ?></td>
                            <td><?php echo $vts['vts_fecha_pagado'] ?></td>
                            <td><?php echo $estado_vts ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>