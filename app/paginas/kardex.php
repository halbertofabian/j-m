<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $url ?>">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kardex</li>
        </ol>
    </nav>
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
            <div class="col-md-4 col-12 ">
                <div class="card">

                    <div class="card-body text-center">
                        <h4 class="card-title"><?php echo ucwords(strtolower($usr['usr_nombre'])) ?></h4>
                        <table class="table table-light table-bordered table-striped">
                            <tr>
                                <th>Venta</th>
                                <th>Credito</th>
                                <th>Pagado</th>
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
                                <td>Contado:</td>
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
        <?php endforeach; ?>

    </div>
</div>