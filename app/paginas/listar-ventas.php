<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $url ?>">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de ventas</li>
        </ol>
    </nav>
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
                            <th>Cantidad</th>
                            <th>Tipo de pago</th>
                            <th>Fecha pagado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ventas = VentasModelo::mdlConsultarVenta();
                        foreach ($ventas as $key => $vts) :
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
                                <td><?php echo number_format($vts['vts_cantidad'], 2) ?></td>
                                <td><?php echo $vts['vts_tp'] ?></td>
                                <td><?php echo $vts['vts_fecha_pagado'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="mdlAbono" tabindex="-1" aria-labelledby="mdlAbonoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAbonoLabel">Historial de abonos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">

                    <!-- <div class="card border-success">
                      <div class="card-body">
                        <p class="card-text"> <strong>Número de factura:</strong> 10010</p>
                        <p class="card-text text-dark"><strong>Vendedor:</strong>  Efren</p>
                        <p class="card-text text-dark"> <strong>Cliente:</strong>  Softmor</p>

                        <p class="card-text text-dark"> <strong> Cantidad:</strong>  50000 </p>

                      </div>
                    </div> -->
                    <form method="post" id="formGuardarAbono">
                        <div class="row justify-content-center">

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="abs_monto">Ingresa el abono</label>
                                    <input type="text" name="abs_monto" id="abs_monto" class="form-control inputN" placeholder="0.00" required>

                                </div>
                                <input type="hidden" name="abs_venta" id="abs_venta">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary float-right mb-3" name="btnGuardarAbono">Guardar</button>
                            </div>

                            <div class="col-auto">
                                <div class="table-responsive">
                                    <table class="table table-light   table-striped ">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th style="width: 10px;"># Número de movimiento</th>
                                                <th>Usuario registro</th>
                                                <th>Abono</th>
                                                <th>Fecha registro</th>
                                                <th>Adeudo</th>
                                            </tr>
                                        </thead>
                                        <tbody id="historial-abonos">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>



                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(function() {
        $('#mdlAbono').on('shown.bs.modal', function(e) {
            $('#abs_monto').focus();
        })
    });
</script>