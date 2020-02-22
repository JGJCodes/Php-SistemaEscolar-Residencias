<?php

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Reporte.doc");
require('../modelo/Database.php');		


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LISTA DE CALIFICACIONES</title>
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
  </tr>
  
<?PHP
$q = "select * from calificaciones inner join asignaturas on calificaciones.id_asignatura=asignaturas.id_asignatura ";
$q .= "inner join estudiantes on calificaciones.id_estudiante=estudiantes.id_estudiante ";
$q .= "inner join grupos on calificaciones.id_grupo=grupos.id_grupo order by calificaciones.id_grupo";
$sql=mysqli_query($dbc,$q);	
while($res=mysqli_fetch_array($sql)){		

	$codigo=$res["id_calificacion"];
	$est=$res["nombres"]." ".$res["apellido_paterno"]." ".$res["apellido_materno"];
	$asig=$res["titulo"];
	$grupo=$res["etiqueta"];
	$fecha=$res["fecha_limite"];
	$cal=$res["cal_final"];					
?>  
 <tr>
	<td><?php echo $codigo; ?></td>
	<td><?php echo $est; ?></td>
	<td><?php echo $asig; ?></td>
	<td><?php echo $grupo; ?></td>
	<td><?php echo $fecha; ?></td>
	<td><?php echo $cal; ?></td>                
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>