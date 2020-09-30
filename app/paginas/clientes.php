<?php $app->obtenerComponente('encabezado', '', 'Nuevo cliente'); ?>
<div class="container">
    <form method="post">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="cts_nombre">Nombre del cliente / empresa </label>
                    <input type="text" name="cts_nombre" id="cts_nombre" class="form-control" placeholder="Introduce el nombre del cliente / empresa" required>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="cts_correo">Correo electrónico</label>
                    <input type="email" name="cts_correo" id="cts_correo" class="form-control" placeholder="Correo electrónico">
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="cts_telefono">Número de teléfono</label>
                    <input type="text" name="cts_telefono" id="cts_telefono" class="form-control" placeholder="Número de teléfono">
                </div>
            </div>
            <div class="col-12">
                <div class="alert alert-dark" role="alert">
                    <strong>Dirección</strong>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="cts_dir_calle">Calle </label>
                    <input type="text" name="cts_dir_calle" id="cts_dir_calle" class="form-control" placeholder="Calle">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="cts_dir_ext">Número ext </label>
                    <input type="text" name="cts_dir_ext" id="cts_dir_ext" class="form-control" placeholder="Número ext">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="cts_dir_int">Número int </label>
                    <input type="text" name="cts_dir_int" id="cts_dir_int" class="form-control" placeholder="Número int">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="cts_dir_cp">C.P. </label>
                    <input type="text" name="cts_dir_cp" id="cts_dir_cp" class="form-control" placeholder="Código postal">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="cts_dir_col">Colonia </label>
                    <input type="text" name="cts_dir_col" id="cts_dir_col" class="form-control" placeholder="Colonia">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="cts_dir_mun">Múnicipio </label>
                    <input type="text" name="cts_dir_mun" id="cts_dir_mun" class="form-control" placeholder="Múnicipio">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="cts_dir_estado">Estado </label>
                    <input type="text" name="cts_dir_estado" id="cts_dir_estado" class="form-control" value="Jalisco" placeholder="Estado">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="cts_dir_pais">País </label>
                    <input type="text" name="cts_dir_pais" id="cts_dir_pais" class="form-control" value="México" placeholder="País">
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary float-right" name="btnAgregarCliente">Guardar cliente</button>
            </div>
            
        </div>
        <?php
            $crearCliente = new ClientesControlador();
            $crearCliente -> ctrAgregarClientes();
        ?>
    </form>
</div>