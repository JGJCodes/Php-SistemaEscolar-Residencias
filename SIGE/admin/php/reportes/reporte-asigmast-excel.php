<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte.xls");

require('../modelo/Database.php');		


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REPORTE DE LA TABLA ASIGNATURA-MAESTRO</title>
</head>
<body>
<h1>REPORTE DE LA TABLA ASIGNATURA-MAESTRO</h1>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><strong>CLAVE</strong></td>
    <td><strong>CLAVE DE LA ASIGNATURA</strong></td>
	<td><strong>NOMBRE DE LA ASIGNATURA</strong></td>
    <td><strong>CLAVE DEL MAESTRO</strong></td>
	<td><strong>NOMBRE DEL MAESTRO </strong></td>
     <td><strong>CLAVE DEL GRUPO</strong></td>
	 <td><strong>NOMBRE DEL GRUPO</strong></td>
  </tr>
  
<?PHP
$q = "select * from asignatura_maestro inner join asignaturas on asignatura_maestro.id_asignatura=asignaturas.id_asignatura ";
$q .= "inner join maestros on asignatura_maestro.id_maestro=maestros.id_maestro ";
$q .= "inner join grupos on asignatura_maestro.id_grupo=grupos.id_grupo order by id_asignaturaconmaestros";
$sql=mysqli_query($dbc,$q);
while($res=mysqli_fetch_array($sql)){		
	$codigo=$res["id_asignaturaconmaestros"];
	$asig=$res["id_asignatura"];
	$titulo=$res["titulo"];
	$maestro=$res["id_maestro"];
	$nombre=$res["nombres"]." ".$res["apellido_paterno"]." ".$res["apellido_materno"];
	$grupo=$res["id_grupo"];
	$etiqueta=$res["etiqueta"];
?>  
 <tr>
	<td><?php echo $codigo; ?></td>
	<td><?php echo $asig; ?></td>
	<td><?php echo $titulo; ?></td>
	<td><?php echo $maestro; ?></td> 
	<td><?php echo $nombre; ?></td>
	<td><?php echo $grupo; ?></td>
	<td><?php echo $etiqueta; ?></td>
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>