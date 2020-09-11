<?php $app->obtenerComponente('encabezado', '', 'Nueva venta'); ?>
<div class="container">
  <form method="post">
    <div class="row">
      <div class="form-group col-6">
        <label for="vts_vendedor">Nombre del vendedor</label>
        <select name="vts_vendedor" id="vts_vendedor" class="form-control select2">
          <option value="">Elija el vendedor</option>
        </select>
        <button type="button" class="btn btn-link float-right" data-toggle="modal" data-target="#mdlVendedor">
          Agregar nuevo vendedor
        </button>
      </div>
      <div class="form-group col-6">
        <label for="vts_cliente">Nombre del Cliente</label>
        <select name="vts_cliente" id="vts_cliente" class="form-control select2">
          <option value="">Elija el cliente</option>
        </select>
        <button type="button" class="btn btn-link float-right" data-toggle="modal" data-target="#mdlCliente">
          Agregar nuevo cliente
        </button>
      </div>
      <div class="form-group col-md-4 col-12">
        <label for="vts_factura">Nota de venta</label>
        <input type="text" name="vts_factura" id="vts_factura" class="form-control" placeholder="Introduce la nota de venta aquí">
      </div>
      <div class="form-group col-md-4 col-12">
        <label for="vts_fecha_venta">Fecha de venta</label>
        <input type="date" name="vts_fecha_venta" id="vts_fecha_venta" class="form-control theDate">
      </div>
      <div class="form-group col-md-4 col-12">
        <label for="vts_cantidad">Cantidad</label>
        <input type="text" name="vts_cantidad" id="vts_cantidad" class="form-control inputN" placeholder="0.00">
      </div>

      <div class="alert alert-dark col-12" role="alert">
        <strong>Tipo de pago</strong>
      </div>

      <div class="form-group col-md-4">
        <label for="vts_tp">Tipo de pago</label>
        <select name="vts_tp" id="vts_tp" class="form-control">
          <option value="Credito">Crédito</option>
          <option value="Contado">Contado</option>
        </select>
      </div>
      <div class="form-group col-md-4 col-12">
        <label for="abs_monto">Monto</label>
        <input type="text" name="abs_monto" id="abs_monto" class="form-control inputN" placeholder="0.00">
      </div>
      <div class="form-group col-md-12 col-12">
        <button type="submit" class="btn btn-primary float-right" name="btnGuardarVenta">Guardar venta</button>
      </div>

    </div>
    <?php

    $guardarVenta = new VentasControlador();
    $guardarVenta->ctrGuardarVenta();

    ?>
  </form>
</div>


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
      <form method="post" id="formAddVendedor" >
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
      <form method="post" id="formAddCliente" >
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
  $('.select2').select2();
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