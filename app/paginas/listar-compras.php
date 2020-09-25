<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $url ?>">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de compras</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12">

            <div class="table-responsive">
                <table class="table tablaCompras table-light tablas  table-striped">
                    <thead>
                        <tr>
                            <th>#Número de folio</th>
                            <th>Estado</th>
                            <th>Proveedor</th>
                            <th>Fecha de compra</th>
                            <th>Fecha de pago</th>
                            <th>Cantidad</th>
                            <th>Tipo de pago</th>
                            <th>Método de pago</th>
                            <th>Fecha pagado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $compras = ComprasModelo::mdlConsultarCompra();
                        foreach ($compras as $key => $cps) :
                            $estado_cps = $cps['cps_estado_pagado'] == 1 ? '<strong class="text-success text-center">PAGADA</strong>' :
                                '<button type="button" class="btn btn-sm btn-primary btnListarAbonos" cps_folio=' . $cps['cps_folio'] . ' data-toggle="modal" data-target="#mdlAbono">ABONAR</button>';
                        ?>
                            <tr>
                                <td class="text-dark"> <?php echo $cps['cps_folio'] ?></td>
                                <td>
                                    <?php echo $estado_cps ?>

                                </td>

                                <td><?php echo $cps['pvs_nombre'] ?></td>
                                <td><?php echo $cps['cps_fecha_compra'] ?></td>
                                <td><?php echo $cps['cps_fecha_pago'] ?></td>
                                <td><?php echo number_format($cps['cps_cantidad'], 2) ?></td>
                                <td><?php echo $cps['cps_tp'] ?></td>
                                <td><?php echo $cps['cps_mp'] ?></td>
                                <td><?php echo $cps['cps_fecha_pagado'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>