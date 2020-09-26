<?php

if (isset($rutas[1]) && $rutas[1] != "") :
  $vts = VentasModelo::mdlConsultarVenta($rutas[1]);
  //echo '<pre>', print_r($vts), '</pre>';
  if ($vts != false) :

    $app->obtenerComponente('encabezado-nivel-2', '', 'Editar venta #' . $rutas[1], array(['ruta'=>'listar-ventas', 'label' => 'Listar ventas']));



?>

    <div class="container">
      <form method="post">
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label for="vts_vendedor">Nombre del vendedor</label>
            <select name="vts_vendedor" id="vts_vendedor" class="form-control select2" required>
              <option value="<?php echo $vts['vts_vendedor'] ?>"><?php echo $vts['usr_nombre'] ?></option>
            </select>
            <button type="button" class="btn btn-link float-right" data-toggle="modal" data-target="#mdlVendedor">
              Agregar nuevo vendedor
            </button>
          </div>
          <div class="form-group col-md-6 col-12">
            <label for="vts_cliente">Nombre del Cliente</label>
            <select name="vts_cliente" id="vts_cliente" class="form-control select2" required>
              <option value="<?php echo $vts['vts_cliente'] ?>"><?php echo  $vts['cts_nombre'] ?></option>
            </select>
            <button type="button" class="btn btn-link float-right" data-toggle="modal" data-target="#mdlCliente">
              Agregar nuevo cliente
            </button>
          </div>
          <div class="form-group col-md-4">
            <label for="vts_tv">Tipo de venta</label>
            <select name="vts_tv" id="vts_tv" class="form-control" required>
              <option value="<?php echo $vts['vts_tv'] ?>"><?php echo $vts['vts_tv'] ?></option>
              <option value="Factura">Factura</option>
              <option value="Remisión">Remisión</option>
            </select>
          </div>
          <div class="form-group col-md-4 col-12">
            <label for="vts_factura">Nota de venta</label>
            <input type="text" name="vts_factura" readonly value="<?php echo $vts['vts_factura'] ?>" id="vts_factura" class="form-control" placeholder="Introduce la nota de venta aquí" required>
          </div>
          <div class="form-group col-md-4 col-12">
            <label for="vts_fecha_venta">Fecha de venta</label>
            <input type="date" name="vts_fecha_venta" required value="<?php $vts_fecha_venta = explode(" ", $vts['vts_fecha_venta']);
                                                                      echo $vts_fecha_venta[0] ?>" id="vts_fecha_venta" class="form-control">
          </div>
          <div class="form-group col-md-4 col-12">
            <label for="vts_fecha_cobro">Fecha de cobro</label>
            <input type="date" name="vts_fecha_cobro" required value="<?php $vts_fecha_cobro = explode(" ", $vts['vts_fecha_cobro']);
                                                                      echo $vts_fecha_cobro[0] ?>" id="vts_fecha_cobro" class="form-control">
          </div>
          <div class="form-group col-md-4 col-12">
            <label for="vts_cantidad">Cantidad</label>
            <input type="text" name="vts_cantidad" readonly required id="vts_cantidad" value="<?php echo $vts['vts_cantidad'] ?>" class="form-control inputN" placeholder="0.00">
          </div>

          <div class="alert alert-dark col-12" role="alert">
            <strong>Tipo de pago</strong>
          </div>

          <div class="form-group col-md-4">
            <label for="vts_tp">Tipo de pago</label>
            <select name="vts_tp" id="vts_tp" class="form-control"  required>
              <option value="<?php echo $vts['vts_tp'] ?>"><?php echo $vts['vts_tp'] ?></option>
              <!-- <option value="Credito">Credito</option>
              <option value="Contado">Contado</option> -->
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="vts_mp">Método de pago</label>
            <select name="vts_mp" id="vts_mp" class="form-control" required>
              <option value="<?php echo $vts['vts_mp'] ?>"><?php echo $vts['vts_mp'] ?></option>
              <option value="Transferencia">Transferencia</option>
              <option value="Efectivo">Efectivo</option>
              <option value="Cheque">Cheque</option>
            </select>
          </div>
          <!-- <div class="form-group col-md-4 col-12">
            <label for="abs_monto">Monto</label>
            <input type="text" name="abs_monto" id="abs_monto" class="form-control inputN" value="<?php //echo $vts['abs_monto'] 
                                                                                                  ?>" placeholder="0.00">
          </div> -->
          <div class="form-group col-12 col-md-8">
            <label for="vts_nota">Nota</label>
            <textarea class="form-control" name="vts_nota" id="vts_nota" cols="30" rows="5"><?php echo $vts['vts_nota'] ?></textarea>
          </div>
          <div class="form-group col-md-4 col-12">

            <button type="submit" class="btn btn-primary float-right" name="btnEditarVenta">Actualizar venta</button>
          
            <a href="<?php echo $url.'listar-ventas' ?>" class="btn btn-danger btn-block " >Cancelar</a>

          </div>
          

        </div>
        <?php

        $editarVenta = new VentasControlador();
        $editarVenta->ctrEditarVenta();

        ?>
      </form>
    </div>

  <?php else :

    $app->ObtenerPagina('404');

  endif;

else :
  $app->obtenerComponente('encabezado', '', 'Nueva venta');

  ?>
  <div class="container">
    <form method="post">
      <div class="row">
        <div class="form-group col-md-6 col-12">
          <label for="vts_vendedor">Nombre del vendedor</label>
          <select name="vts_vendedor" id="vts_vendedor" class="form-control select2" required>
            <option value="">Elija el vendedor</option>
          </select>
          <button type="button" class="btn btn-link float-right" data-toggle="modal" data-target="#mdlVendedor">
            Agregar nuevo vendedor
          </button>
        </div>
        <div class="form-group col-md-6 col-12">
          <label for="vts_cliente">Nombre del Cliente</label>
          <select name="vts_cliente" id="vts_cliente" class="form-control select2" required>
            <option value="">Elija el cliente</option>
          </select>
          <button type="button" class="btn btn-link float-right" data-toggle="modal" data-target="#mdlCliente">
            Agregar nuevo cliente
          </button>
        </div>
        <div class="form-group col-md-4">
          <label for="vts_tv">Tipo de venta</label>
          <select name="vts_tv" id="vts_tv" class="form-control" required>
            <option value="Factura">Factura</option>
            <option value="Remisión">Remisión</option>
          </select>
        </div>
        <div class="form-group col-md-4 col-12">
          <label for="vts_factura">Nota de venta</label>
          <input type="text" name="vts_factura" id="vts_factura" class="form-control" placeholder="Introduce la nota de venta aquí" required>
        </div>
        <div class="form-group col-md-4 col-12">
          <label for="vts_fecha_venta">Fecha de venta</label>
          <input type="date" name="vts_fecha_venta" required id="vts_fecha_venta" class="form-control theDate">
        </div>
        <div class="form-group col-md-4 col-12">
          <label for="vts_fecha_cobro">Fecha de cobro</label>
          <input type="date" name="vts_fecha_cobro" required id="vts_fecha_cobro" class="form-control theDateTo">
        </div>
        <div class="form-group col-md-4 col-12">
          <label for="vts_cantidad">Cantidad</label>
          <input type="text" name="vts_cantidad" required id="vts_cantidad" class="form-control inputN" placeholder="0.00">
        </div>

        <div class="alert alert-dark col-12" role="alert">
          <strong>Tipo de pago</strong>
        </div>

        <div class="form-group col-md-4">
          <label for="vts_tp">Tipo de pago</label>
          <select name="vts_tp" id="vts_tp" class="form-control" required>
            <option value="Credito">Crédito</option>
            <option value="Contado">Contado</option>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="vts_mp">Método de pago</label>
          <select name="vts_mp" id="vts_mp" class="form-control" required>
            <option value="Transferencia">Transferencia</option>
            <option value="Efectivo">Efectivo</option>
            <option value="Cheque">Cheque</option>
          </select>
        </div>
        <div class="form-group col-md-4 col-12">
          <label for="abs_monto">Monto</label>
          <input type="text" name="abs_monto" required id="abs_monto" class="form-control inputN" value="0.00" placeholder="0.00">
        </div>
        <div class="form-group col-12 col-md-8">
          <label for="vts_nota">Nota</label>
          <textarea class="form-control" name="vts_nota" id="vts_nota" cols="30" rows="5"></textarea>
        </div>
        <div class="form-group col-md-4 col-12">
          <button type="submit" class="btn btn-primary float-right" name="btnGuardarVenta">Guardar venta</button>
        </div>

      </div>
      <?php

      $guardarVenta = new VentasControlador();
      $guardarVenta->ctrGuardarVenta();

      ?>
    </form>
  </div>
<?php endif; ?>

<!-- Modal -->
<div class="modal fade" id="mdlVendedor" tabindex="-1" aria-labelledby="mdlVendedorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mdlVendedorLabel">Nuevo vendedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="formAddVendedor">
        <div class="modal-body">

          <div class="form-group">
            <label for="usr_nombre">Nombre del vendedor</label>
            <input type="text" name="usr_nombre" id="usr_nombre" class="form-control" placeholder="Introduzca el nombre del vendedor " required autofocus>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Agregar vendedor</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="mdlCliente" tabindex="-1" aria-labelledby="mdlClienteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mdlClienteLabel">Nuevo cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="formAddCliente">
        <div class="modal-body">

          <div class="form-group">
            <label for="cts_nombre">Nombre del cliente</label>
            <input type="text" name="cts_nombre" id="cts_nombre" class="form-control" placeholder="Introduzca el nombre del cliente / empresa ">
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Agregar cliente</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>

</script>


<script>
  $(function() {
    $('#mdlVendedor').on('shown.bs.modal', function(e) {
      $('#usr_nombre').focus();
    })
  });
  $(function() {
    $('#mdlCliente').on('shown.bs.modal', function(e) {
      $('#cts_nombre').focus();
    })
  });
</script>