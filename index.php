<?php
require_once 'app/modulos/app/app.controlador.php';
require_once 'app/modulos/login/login.controlador.php';
require_once 'app/modulos/ventas/ventas.controlador.php';



require_once 'app/modulos/login/login.modelo.php';
require_once 'app/modulos/ventas/ventas.modelo.php';







// Iniciar App

$iniciarApp = new AppControlador();
$iniciarApp->iniciarApp();
