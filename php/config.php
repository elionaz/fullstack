<?php

//librerias para poder usar la Api de google
 
require_once 'include/google-api-php-client/apiClient.php';
require_once 'include/google-api-php-client/contrib/apiOauth2Service.php';
require_once 'include/idiorm.php';
require_once 'include/relativeTime.php';
 
 
session_name('nombre-sesion');
session_start();
 
//configuracion de host
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'prueba';

//conexion a la bd usando PDO
ORM::configure("mysql:host=$host;dbname=$database");
ORM::configure('username', $user);
ORM::configure('password', $pass);
 
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
 
// LLenar con tus datos de Api console google
 
$redirect_url = 'http://localhost:80/reporte.php'; 
$client_id = '499958632623-m15dgrqunmdur185v8fnj0gl7ma1a89d.apps.googleusercontent.com';
$client_secret = 'rJTlEVF7p9bHjr9HHnQa3sSa';
$api_key = 'AIzaSyCsFFLru7xXRTy1_mGA8QWH7M69E-DIUT8';