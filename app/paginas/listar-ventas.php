 <?php  $app->obtenerComponente('encabezado', '', 'Ventas');?>
<div class="container">
    
    <div class="row">
        <div class="col-12">
            <a  href="<?php echo $url.'ventas' ?>" class="btn btn-primary float-right mb-1"> <i class="fa fa-file-text"></i> Nueva venta</a>
        </div>
        <div class="col-12">

            <div class="table-responsive">
                <table class="table tablaVentas table-light tablas  table-striped">
                    <thead>
                        <tr>
                            <th>#Número de factura</th>
                            <th>ABONO</th>
                            <th>Vendedor</th>
                            <th>Cliente</th>
                            <th>Fecha de venta</th>
                            <th>Fecha de cobro</th>
                            <th>Cantidad</th>
                            <th>Tipo de pago</th>
                            <th>Método de pago</th>
                            <th>Fecha pagado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ventas = VentasModelo::mdlConsultarVenta();

                        foreach ($ventas as $key => $vts) :
                            $adeudo = VentasModelo::mdlAdeudoVenta($vts['vts_factura']);
                            $estado_vts = $vts['vts_estado_pagado'] == 1 ? '<strong class="text-success text-center">PAGADA</strong>' :
                                '<button type="button" class="btn btn-sm btn-primary btnListarAbonos" vts_factura=' . $vts['vts_factura'] . ' data-toggle="modal" data-target="#mdlAbono">ABONAR</button>';
                        ?>
                            <tr>
                                <td> <a href="<?php echo $url . 'abonos/' . $vts['vts_factura'] ?>" class="btn btn-dark"> <i class="fa fa-search" aria-hidden="true"></i> <?php echo $vts['vts_factura'] ?></a></td>
                                <td>
                                    <?php echo $estado_vts ?>

                                </td>

                                <td><?php echo $vts['usr_nombre'] ?></td>
                                <td><?php echo $vts['cts_nombre'] ?></td>
                                <td><?php echo $vts['vts_fecha_venta'] ?></td>
                                <td><?php echo $vts['vts_fecha_cobro'] ?></td>
                                <td data-toggle="tooltip" data-placement="top" title=" Adeuda $ <?php echo number_format($adeudo[0]['abs_adeudo'], 2) ?> "> <span><?php echo number_format($vts['vts_cantidad'], 2) ?></span></td>
                                <td><?php echo $vts['vts_tp'] ?></td>
                                <td><?php echo $vts['vts_mp'] ?></td>

                                <td><?php echo $vts['vts_fecha_pagado'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-filter" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item text-danger btnEliminarVenta" vts_factura = "<?php echo $vts['vts_factura'] ?>" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar </button>
                                            <a class="dropdown-item text-warning" href="<?php echo $url . 'ventas/' . $vts['vts_factura'] ?>"> <i class="fa fa-edit" aria-hidden="true"></i> Editar</a>
                                            <a class="dropdown-item" href="<?php echo $url . 'abonos/' . $vts['vts_factura'] ?>" class="btn btn-dark"> <i class="fa fa-search" aria-hidden="true"></i> Ver </a>
                                            <!-- <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a> -->
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php
$app->obtenerComponente('abono-venta');
?>