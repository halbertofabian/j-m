<?php
$abonos = VentasModelo::mdlConsultarAbonosVentas($rutas[1]);
if (sizeof($abonos) > 0) :
    //var_dump($abonos);
    $app->obtenerComponente('encabezado-nivel-2', '', 'Abono venta #' . $rutas[1], array(['ruta' => 'listar-ventas', 'label' => 'Listar ventas']));

    // echo "<pre>", print_r($abonos), "</pre>";
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Factura #<?php echo $rutas[1] ?>
                        <form method="post" id="formGuardarAbono">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="abs_mp">Método de pago</label>
                                        <select name="abs_mp" id="abs_mp" class="form-control">
                                            <option value="<?php echo $abonos[0]['vts_mp'] ?>"><?php echo $abonos[0]['vts_mp'] ?></option>
                                            <option value="Transferencia">Transferencia</option>
                                            <option value="Efectivo">Efectivo</option>
                                            <option value="Cheque">Cheque</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="abs_monto">Ingresa el abono</label>
                                        <input type="text" name="abs_monto" id="abs_monto" class="form-control inputN" placeholder="0.00" required>
                                        <input type="hidden" name="abs_venta" value="<?php echo $rutas[1] ?>">
                                        <button type="submit" class="btn btn-primary float-right mb-1 mt-2" name="btnGuardarAbono">Guardar</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <div class="col-12">
                                <p class="card-text">
                                    Cliente: <span class="text-primary"><?php echo ucwords(strtolower($abonos[0]['cts_nombre'])) ?></span>
                                    <br>
                                    Vendedor: <span class="text-primary"> <a href="<?php echo $url . 'kardex/' . $abonos[0]['usr_id'] ?>"> <?php echo ucwords(strtolower($abonos[0]['usr_nombre'])) ?> </a> </span>
                                </p>

                            </div>

                            <div class="col-md-4 col-6">
                                Fecha venta: <span class="text-primary"><?php echo ucwords(strtolower($abonos[0]['vts_fecha_venta'])) ?></span>
                                <br>
                                Usuario registro: <span class="text-primary"><?php echo ucwords(strtolower($abonos[0]['vts_usuario_registro'])) ?></span>
                                <br>



                            </div>
                            <div class="col-md-4 col-6">
                                Tipo de pago: <span class="text-primary"><?php echo ucwords(strtolower($abonos[0]['vts_tp'])) ?></span>
                                <br>
                                $ <span class="text-primary" style="font-size: 20px;"><?php echo number_format($abonos[0]['vts_cantidad'], 2) ?></span>


                            </div>

                            <div class="col-md-4 col-6">

                                Estado:
                                <span class="text-primary">
                                    <?php

                                    if ($abonos[0]['vts_estado_pagado'] == 1) {
                                        echo 'PAGADA <br>';
                                        echo '<span class="text-dark">Fecha de pago: </span>' . $abonos[0]['vts_fecha_pagado'] . '';
                                    } else {
                                        echo 'POR PAGAR';
                                    }

                                    ?>
                                </span>

                            </div>

                            <div class="col-12 mt-3">
                                <div class="table-responsive">
                                    <table class="table table-light tablas  table-striped ">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th style="width: 10px;"># Número de movimiento</th>
                                                <th>Usuario registro</th>
                                                <th>Abono</th>
                                                <th>Fecha registro</th>
                                                <th>Adeudo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($abonos as $key => $abs) :
                                                echo
                                                    '
                                        <tr>
                                            <td style="width: 10px;">' . $abs['abs_id'] . '</td>
                                            <td>' . $abs['abs_usuario_registro'] . '</td>
                                            <td>' . number_format($abs['abs_monto'], 2) . '</td>
                                            <td>' . $abs['abs_fecha'] . '</td>
                                            <td>' . number_format($abs['abs_adeudo'], 2) . '</td>
                                        </tr>
                                    ';
                                            endforeach;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else :
$app -> ObtenerPagina('404');
endif;
?>