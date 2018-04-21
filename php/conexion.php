<?php 
//datos del host
$user="root";
$pass="";
$host="localhost";
$db="prueba";

//conexion a la bd usando mysqli
$con = new mysqli("$host", "$user", "$pass", "$db");
if ($con -> connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $con -> connect_errno . ") ";
}else{
	
}

?>