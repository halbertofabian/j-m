<div class="accountbg"></div>
<div class="wrapper-page">
    <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="p-3">
                        <div class="float-right text-right">
                            <h4 class="font-18 mt-3 m-b-5">Bienvenidos a J&M Médica </h4>
                            <p class="text-muted">Inicia sesión para entrar al sistema.</p>
                        </div>
                        <!-- <span class="text-dark" style="font-weight: bold; font-size: 48px;">J&M</span> -->
                        <a href="<?php $url ?>" class="logo-admin"><img src="<?php echo $url . 'app/' ?>assets/images/j-m-logo.png" height="100" alt="logo"></a>
                    </div>

                    <div class="p-3">

                        <form class="form-horizontal m-t-10" method="post">

                            <div class="form-group">
                                <label for="usr_correo">Correo electrónico</label>
                                <input type="email" class="form-control" id="usr_correo" name="usr_correo" placeholder="Introduce tu correo electrónico" required>
                            </div>

                            <div class="form-group">
                                <label for="usr_clave">Contraseña</label>
                                <input type="password" class="form-control" id="usr_clave" name="usr_clave" placeholder="Introduce tu contraseña" required>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" name="btnIniciarSesion" type="submit">Iniciar sesión</button>
                                </div>
                            </div>

                            <?php

                            $login = new LoginControlador();
                            $login->ctrIniciarSesion();

                            ?>

                            <!-- <div class="form-group row m-t-30">
                        <div class="col-sm-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                            </div>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div> -->

                            <!-- <div class="form-group m-t-30 mb-0 row">
                        <div class="col-12 text-center">
                            <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                        </div>
                    </div> -->
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>




</div>