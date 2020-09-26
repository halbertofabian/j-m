<?php $app->obtenerComponente('encabezado', '', 'Listar Gastos'); ?>


<div class="container">



    <div class="row d-none" id="lista-gastos-categoria">
        <div class="col-12">
            <button class="btn btn-dark float-right mb-1 btnListarGastos"><i class="fa fa-list" aria-hidden="true"></i> Lista</button>
        </div>
        <?php
        $totalGastos = 0;
        $cetegorias = GastosModelo::mdlConsultarCategorias();

        foreach ($cetegorias as $key => $gts) :
            $gastosT = 0;
        ?>
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="text-primary"> <?php echo $gts['gts_nombre'] ?></strong>
                        <p class="card-text">Presupuesto mensual <strong>$ <?php echo number_format($gts['gts_presupuesto'], 2) ?> </strong> </p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table tablaGastos table-light tablas  table-striped">
                                        <thead>
                                            <tr>
                                                <th>#Número de gasto</th>
                                                <th>Concepto</th>
                                                <th>Fecha de gasto</th>
                                                <th>Cantidad</th>
                                                <th>Metodo de pago</th>
                                                <th>Usuario registro</th>
                                                <th>Nota</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $gastos = GastosModelo::mdlConsultarGastos("", $gts['gts_id']);
                                            foreach ($gastos as $key => $tgts) :
                                                $gastosT += $tgts['tgts_cantidad'];
                                            ?>
                                                <tr>

                                                    <td><?php echo $tgts['tgts_id'] ?></td>
                                                    <td><?php echo $tgts['tgts_concepto'] ?></td>
                                                    <td><?php echo $tgts['tgts_fecha_gasto'] ?></td>
                                                    <td><?php echo $tgts['tgts_cantidad'] ?></td>
                                                    <td><?php echo $tgts['tgts_mp'] ?></td>
                                                    <td><?php echo $tgts['tgts_usuario_registro'] ?></td>
                                                    <td><?php echo $tgts['tgts_nota'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="text-primary">Total </span><strong>$ <?php $totalGastos += $gastosT;
                                                                            echo  number_format($gastosT, 2);  ?></strong>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <hr>
        <div class="col-12">
            <h5><?php echo 'Total de gastos $ ' . number_format($totalGastos, 2) ?></h5>

        </div>
    </div>

    <div class="row " id="lista-gastos">
        <div class="col-12">
            <button class="btn btn-dark float-right mb-1 btnListarGastosCat "><i class="fa fa-th" aria-hidden="true"></i> Categoría</button>
        </div>
        <div class="col-12">

            <div class="table-responsive">
                <table class="table tablaGastos table-light tablas  table-striped" >
                    <thead>
                        <tr>
                            <th>#Número de gasto</th>
                            <th>Categoría</th>
                            <th>Concepto</th>
                            <th>Fecha de gasto</th>
                            <th>Cantidad</th>
                            <th>Metodo de pago</th>
                            <th>Usuario registro</th>
                            <th>Nota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $gastos = GastosModelo::mdlConsultarGastos();
                        foreach ($gastos as $key => $tgts) :

                        ?>
                            <tr>

                                <td><?php echo $tgts['tgts_id'] ?></td>
                                <td><?php echo $tgts['gts_nombre'] ?></td>
                                <td><?php echo $tgts['tgts_concepto'] ?></td>
                                <td><?php echo $tgts['tgts_fecha_gasto'] ?></td>
                                <td><?php echo $tgts['tgts_cantidad'] ?></td>
                                <td><?php echo $tgts['tgts_mp'] ?></td>
                                <td><?php echo $tgts['tgts_usuario_registro'] ?></td>
                                <td><?php echo $tgts['tgts_nota'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>