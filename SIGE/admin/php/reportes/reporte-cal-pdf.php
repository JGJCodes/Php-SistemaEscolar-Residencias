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
<h1>REPORTE DE LA TABLA CALIFICACIONES</h1>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
   <tr>
    <td><strong>CLAVE</strong></td>
    <td><strong>NOMBRE DE LA ASIGNATURA</strong></td>
	<td><strong>NOMBRE DEL ESTUDIANTE</strong></td>
	<td><strong>NOMBRE DEL GRUPO</strong></td>
    <td><strong>FECHA</strong></td>
    <td><strong>CALIFICACION</strong></td>
  </tr>';
  
$q = "select * from calificaciones inner join asignaturas on calificaciones.id_asignatura=asignaturas.id_asignatura ";
$q .= "inner join estudiantes on calificaciones.id_estudiante=estudiantes.id_estudiante ";
$q .= "inner join grupos on calificaciones.id_grupo=grupos.id_grupo order by calificaciones.id_grupo";
$sql=mysqli_query($dbc,$q);	
while($res=mysqli_fetch_array($sql)){
$codigoHTML.='	
	<tr>
		<td>'.$res['id_calificacion'].'</td>
		<td>'.$res["nombres"]." ".$res["apellido_paterno"]." ".$res["apellido_materno"].'</td>
		<td>'.$res["titulo"].'</td>
		<td>'.$res['etiqueta'].'</td>
		<td>'.$res['fecha_limite'].'</td>
		<td>'.$res['cal_final'].'</td>										
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