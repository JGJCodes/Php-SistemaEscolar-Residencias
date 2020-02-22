<?php

		require_once("../dompdf/dompdf_config.inc.php");
		require('../modelo/Database.php');


$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REPORTE DE LA TABLA MAESTROS</title>
</head>
<body>
<h1>REPORTE DE LA TABLA MAESTROS</h1>
<table width="100%" border="1" cellspacing="0" cellpadding="0">

  <tr>
    <td><strong>CLAVE</strong></td>
    <td><strong>NOMBRE COMPLETO</strong></td>
    <td><strong>CURP</strong></td>
    <td><strong>TITULO</strong></td>
  </tr>';
  


$sql=mysqli_query($dbc,"select * from maestros");
while($res=mysqli_fetch_array($sql)){
$codigoHTML.='	
	<tr>
		<td>'.$res['id_maestro'].'</td>
		<td>'.$res['nombres'].' '.$res['apellido_paterno'].' '.$res['apellido_materno'].'</td>
		<td>'.$res['curp'].'</td>
		<td>'.$res['titulo'].'</td>										
	</tr>';
	
}
mysqli_free_result($res);
$codigoHTML.='
</table>
</body>
</html>';
$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte.pdf");
?>