<?php  


include('conexion.php');


$consulta="SELECT * FROM cliente";


$celda=2;

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
// Set document properties
$objPHPExcel->getProperties()->setCreator("Nestor Garcia")
							 ->setLastModifiedBy("Nestor Garcia")
							 ->setTitle("Reporte")
							 ->setSubject("Reporte")
							 ->setDescription("Reporte")
							 ->setKeywords("Reporte")
							 ->setCategory("Reporte");
// Add some data
$objPHPExcel->getActiveSheet(0)
            ->setCellValue('A1', 'Id Cliente')
            ->setCellValue('B1', 'Nombre')
            ->setCellValue('C1', 'Apellido Paterno')
			->setCellValue('D1', 'Apellido Materno')
			->setCellValue('E1', 'E-mail')
            ->setCellValue('F1', 'Fecha de Nacimiento')
            ->setCellValue('G1', 'Lugar de Nacimiento')
            ->setCellValue('H1', 'Sexo')
            ->setCellValue('I1', 'RFC')
            ->setCellValue('J1', 'CURP')
            ->setCellValue('K1', 'Codigo Postal')
            ->setCellValue('L1', 'Estado')
            ->setCellValue('M1', 'Municipio')
            ->setCellValue('N1', 'Colonia');


// Miscellaneous glyphs, UTF-8
$res = $con -> query($consulta);
while ($fila = $res -> fetch_assoc()) {
    
    $id_cliente=$fila['id_cliente'];
    $nombre=$fila['cl_nombre'];
	$ape_pat=$fila['cl_ape_pat'];
	$ape_mat=$fila['cl_ape_mat'];
	$correo=$fila['cl_mail'];
	$fec_nac=$fila['cl_fec_nac'];
	$lug_nac=$fila['cl_lug_nac'];
	$sexo=$fila['cl_sexo'];
	$rfc=$fila['cl_rfc'];
	$curp=$fila['cl_curp'];
    $codigo=$fila['cl_cod_pos'];
    $estado=$fila['cl_estado'];
	$municipio=$fila['cl_municipio'];
	$colonia=$fila['cl_colonia'];
	
	
	$a="A".$celda;
	$b="B".$celda;
	$c="C".$celda;
	$d="D".$celda;
	$e="E".$celda;
	$f="F".$celda;
	$g="G".$celda;
	$h="H".$celda;
	$i="I".$celda;
	$j="J".$celda;
	$k="K".$celda;
	$l="L".$celda;
	$m="M".$celda;
	$n="A".$celda;


	$objPHPExcel->getActiveSheet(0)
            	->setCellValue($a, $id_cliente)
            	->setCellValue($b, $nombre)
            	->setCellValue($c, $ape_pat)
				->setCellValue($d, $ape_mat)
				->setCellValue($e, $correo)
				->setCellValue($f, $fec_nac)
				->setCellValue($g, $lug_nac)
				->setCellValue($h, $sexo)
				->setCellValue($i, $rfc)
				->setCellValue($j, $curp)
				->setCellValue($k, $codigo)
				->setCellValue($l, $estado)
				->setCellValue($m, $municipio)
				->setCellValue($n, $colonia);

	$celda++;}
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Reporte');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename=reporte.xls');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;

?>