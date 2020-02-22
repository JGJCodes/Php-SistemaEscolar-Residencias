<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte.xls");

require('../modelo/Database.php');		


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LISTA DE ASISTENCIAS</title>
</head>
<body>
<h1>REPORTE DE LA TABLA ASISTENCIAS</h1>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
   <tr>
    <td><strong>CLAVE</strong></td>
	<td><strong>NOMBRE DE LA ASIGNATURA</strong></td>
	<td><strong>NOMBRE DEL ESTUDIANTE</strong></td>
	<td><strong>NOMBRE DEL GRUPO</strong></td>
    <td><strong>FECHA</strong></td>
    <td><strong>ASISTENCIA</strong></td>
  </tr>
  
<?PHP
$q = "select * from asistencias inner join asignaturas on asistencias.id_asignatura=asignaturas.id_asignatura ";
$q .= "inner join estudiantes on asistencias.id_estudiante=estudiantes.id_estudiante ";
$q .= "inner join grupos on asistencias.id_grupo=grupos.id_grupo order by asistencias.id_grupo";
$sql=mysqli_query($dbc,$q);
		
while($res=mysqli_fetch_array($sql)){		
	$codigo=$res["id_asistencia"];
	$titulo=$res["titulo"];
	$nombre=$res["nombres"]." ".$res["apellido_paterno"]." ".$res["apellido_materno"];
	$etiqueta=$res["etiqueta"];
	$fecha=$res["fecha"];
	$cal=$res["asist"];					
?>  
 <tr>
	<td><?php echo $codigo; ?></td>
	<td><?php echo $titulo; ?></td>
	<td><?php echo $nombre; ?></td>
	<td><?php echo $etiqueta; ?></td>
	<td><?php echo $fecha; ?></td>
	<td><?php echo $cal; ?></td>                
 </tr>  
  <?php
}
  ?>
</table>
</body>
</html>