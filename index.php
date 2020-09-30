<?php
include_once 'config.php';
require_once 'app/modulos/app/app.controlador.php';
require_once 'app/modulos/login/login.controlador.php';
require_once 'app/modulos/ventas/ventas.controlador.php';
require_once 'app/modulos/compras/compras.controlador.php';
require_once 'app/modulos/gastos/gastos.controlador.php';
require_once 'app/modulos/clientes/clientes.controlador.php';






require_once 'app/modulos/login/login.modelo.php';
require_once 'app/modulos/ventas/ventas.modelo.php';
require_once 'app/modulos/compras/compras.modelo.php';
require_once 'app/modulos/gastos/gastos.modelo.php';
require_once 'app/modulos/clientes/clientes.modelo.php';










// Iniciar App

$iniciarApp = new AppControlador();
$iniciarApp->iniciarApp();
