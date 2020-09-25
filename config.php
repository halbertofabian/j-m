<?php

define('FOLDER', 'j&m/');

// Definiendo la ruta de la web 
define('HTTP_HOST', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . FOLDER);

// Definiendo el directorio del proyecto
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/' . FOLDER);

define('DB_NAME', 'db_medica');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
