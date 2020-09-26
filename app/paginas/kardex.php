<?php
if (isset($rutas[1]) && $rutas[1] != "") :
    $ventas = VentasModelo::mdlConsultarVenta("", $rutas[1]);

    //echo '<pre>', print_r($ventas), '</pre>';
    if (sizeof($ventas) > 0) :
        $app->obtenerComponente('encabezado-nivel-2', '', 'Ventas de ' . $ventas[0]['usr_nombre'], array(['ruta' => 'kardex', 'label' => 'kardex'])); ?>
        <div class="row">
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
                                <th>Adeudo</th>
                                <th>Tipo de pago</th>
                                <th>Método de pago</th>
                                <th>Fecha pagado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //$ventas = VentasModelo::mdlConsultarVenta();
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
                                    <td><?php echo number_format($vts['vts_cantidad'], 2) ?></td>
                                    <td><strong class="text-danger"> <?php echo number_format($adeudo[0]['abs_adeudo'],2) ?></strong></td>
                                    <td><?php echo $vts['vts_tp'] ?></td>
                                    <td><?php echo $vts['vts_mp'] ?></td>

                                    <td><?php echo $vts['vts_fecha_pagado'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php else : ?>
        <hr>
        <div class="container">
            <div class="alert alert-danger" role="alert">
                <strong>Este vendedor aún no tiene ventas registradas, <a href="<?php echo $url . 'kardex' ?>">regresar al kardex</a></strong>
            </div>
        </div>

    <?php endif;
else :
    $app->obtenerComponente('encabezado', '', 'Kardex');
    ?>
    <div class="container">


        <div class="row">
            <div class="col-12">
                <button type="button" id="daterange-btn" class="d-none d-sm-inline-block btn btn-default   mr-sm-2 shadow-sm  float-right mb-4">
                    <span>
                        <i class="fa fa-calendar"></i> Rango de fecha
                    </span>
                    <i class="fa fa-caret-down"></i>
                </button>
            </div>

            <?php

            $vendedores = VentasModelo::mdlConsultarVendedores();
            // var_dump($vendedores);

            foreach ($vendedores as $key => $usr) :
            ?>
                <div class="col-md-5 col-12 ">
                    <div class="card">

                        <div class="card-body text-center">
                            <h4 class="card-title"> <a class="text-primary" href="<?php echo $url . 'kardex/' . $usr['usr_id'] ?>"> <?php echo ucwords(strtolower($usr['usr_nombre'])) ?> </a> </h4>
                            <div class="table-responsive">

                                <table class="table table-light table-bordered table-striped">
                                    <tr>
                                        <th>Venta</th>
                                        <th>Credito</th>
                                        <th>Transferencia / Cheque</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php
                                            $ventaTotal = VentasModelo::mdlConsultarSumaVentaVendedor($usr['usr_id']);
                                            echo  number_format($ventaTotal['vts_cantidad_total_vendedor'], 2);
                                            ?>
                                        </td>
                                        <td class="text-danger">
                                            <?php
                                            $creditoTotal = VentasModelo::mdlConsultarSumaCreditoVendedor($usr['usr_id']);
                                            echo number_format($creditoTotal['vts_cantidad_credito_vendedor'], 2);
                                            ?>
                                        </td>
                                        <td class="text-success">
                                            <?php
                                            $monto = VentasModelo::mdlConsultarSumaPagadoVendedor($usr['usr_id']);
                                            echo number_format($monto['abs_monto_pagado'], 2);
                                            ?>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Efectivo:</td>
                                        <td class="text-success">

                                            <?php
                                            $contadoTotal = VentasModelo::mdlConsultarSumaContadoVendedor($usr['usr_id']);
                                            echo number_format($contadoTotal['vts_cantidad_contado_vendedor'], 2);
                                            ?>
                                        </td>

                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
<?php endif; ?>


<?php
$app->obtenerComponente('abono-venta');
?>