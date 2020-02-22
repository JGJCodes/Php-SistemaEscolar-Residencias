<?php

		require_once("../dompdf/dompdf_config.inc.php");
		require('../modelo/Database.php');


$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<h1>REPORTE DE LA TABLA UNIDADES</h1>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><strong>CLAVE</strong></td>
    <td><strong>NOMBRE DE ASIGNATURA</strong></td>
    <td><strong>TEMA DE ESTUDIOS</strong></td>
    <td><strong>DESCRIPCION</strong></td>
  </tr>';
  


$sql=mysqli_query($dbc,"select * from unidades inner join asignaturas on unidades.id_asignatura=asignaturas.id_asignatura order by unidades.id_asignatura");
while($res=mysqli_fetch_array($sql)){
$codigoHTML.='	
	<tr>
		<td>'.$res['id_unidad'].'</td>
		<td>'.$res['titulo'].'</td>
		<td>'.$res['tema'].'</td>
		<td>'.$res['descripcion'].'</td>									
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