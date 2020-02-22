<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte.xls");

require('../modelo/Database.php');		


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REPORTE DE LA TABLA UNIDADES</title>
</head>
<body>
<h1>REPORTE DE LA TABLA UNIDADES</h1>
<table width="100%" border="1" cellspacing="0" cellpadding="0">

  <td><strong>CLAVE</strong></td>
    <td><strong>NOMBRE DE ASIGNATURA</strong></td>
    <td><strong>TEMA DE ESTUDIOS</strong></td>
    <td><strong>DESCRIPCION</strong></td>
  </tr>
  
<?PHP
		
$sql=mysqli_query($dbc,"select * from unidades inner join asignaturas on unidades.id_asignatura=asignaturas.id_asignatura order by unidades.id_asignatura");
while($res=mysqli_fetch_array($sql)){		

	$codigo=$res["id_unidad"];
	$asig = $res["titulo"];
	$titulo=$res["tema"];
	$programa=$res["descripcion"];						
?>  
 <tr>
	<td><?php echo $codigo; ?></td>
	<td><?php echo $asig; ?></td>
	<td><?php echo $titulo; ?></td>
	<td><?php echo $programa; ?></td>  
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>