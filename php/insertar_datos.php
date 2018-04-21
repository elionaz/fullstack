<header>
	<!-- librerias y metodos usados para mostrar mensajes de alerta  -->
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/sweetalert2.js"></script>
	<link rel="stylesheet" href="../css/sweetalert2.min.css">

	<script type="text/javascript">
	function aceptar(){
		swal({
		  title: 'Pruebas',
		  text: "Datos del Cliente Ingresados Correctamente.",
		  type: 'success',
		  showCancelButton: false,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar'
		}).then(function () {
		  window.location="../index.php";
		})
	}

	

	function denied(){
		swal({
		  title: 'Pruebas',
		  text: "Error al ingresar los datos. Intentelo de nuevo",
		  type: 'error',
		  showCancelButton: false,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Aceptar'
		}).then(function () {
		  window.history.back();
		})
	}

	</script>
</header>

<?php


include('conexion.php');

//variables que almacen los datos del formulario
$nombre=$_POST['nombre_user'];
$ap_pat=$_POST['ap_user'];
$ap_mat=$_POST['am_user'];
$correo=$_POST['mail_user'];
$fecha_nac=$_POST['nac_user'];
$lugar_nac=$_POST['lnac_user'];
$sexo=$_POST['sexo_user'];
$codigo_pos=$_POST['cp_user'];
$rfc=$_POST['rfc_user'];
$curp=$_POST['curp_user'];
$estado=$_POST['ciudad_user'];
$municipio=$_POST['municipio_user'];
$colonia=$_POST['colonia_user'];

//sentencia sql para insertar los datos del cliente a la bd
$ins = "INSERT INTO cliente(cl_nombre, cl_ape_pat, cl_ape_mat, cl_mail, cl_fec_nac, cl_lug_nac, cl_sexo,	cl_cod_pos, cl_rfc,	cl_curp, cl_estado,	cl_municipio, cl_colonia) 
VALUES('$nombre' , '$ap_pat' , '$ap_mat' , '$correo' , '$fecha_nac' , '$lugar_nac' , '$sexo' , '$codigo_pos' , '$rfc' , '$curp' , '$estado' , '$municipio' , '$colonia')";
	$result = $con -> query($ins);
    if (!$result) {
		echo "<script type='text/javascript'>
			denied();
		  </script>";
	}else{
		echo "<script type='text/javascript'>
			aceptar();
		  </script>";
	}
?>

