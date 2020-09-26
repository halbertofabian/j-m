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

                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="abs_mp">Método de pago</label>
                                    <select name="abs_mp" id="abs_mp" class="form-control">
                                        <option value="Transferencia">Transferencia</option>
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Cheque">Cheque</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-12 col-md-4">
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