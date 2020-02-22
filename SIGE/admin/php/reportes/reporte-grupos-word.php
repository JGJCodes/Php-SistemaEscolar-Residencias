<?php

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Reporte.doc");
require('../modelo/Database.php');		


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REPORTE DE LA TABLA GRUPOS</title>
</head>
<body>
<h1>REPORTE DE LA TABLA GRUPOS</h1>
<table width="100%" border="1" cellspacing="0" cellpadding="0">

  <tr>
    <td><strong>CLAVE</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>TURNO</strong></td>
    <td><strong>SALON</strong></td>
    <td><strong>GRADO ESCOLAR</strong></td>
    <td><strong>PROMEDIO</strong></td>
  </tr>
  
<?PHP
		
$sql=mysqli_query($dbc,"select * from grupos");
while($res=mysqli_fetch_array($sql)){		

	$codigo=$res["id_grupo"];
	$nombre=$res["etiqueta"];
	$turno=$res["turno"];
	$salon=$res["salon"];
	$grado=$res["grado_escolar"];
	$promedio=$res["promedio"];					

?>  
 <tr>
	<td><?php echo $codigo; ?></td>
	<td><?php echo $nombre; ?></td>
	<td><?php echo $turno; ?></td>
	<td><?php echo $salon; ?></td>
	<td><?php echo $grado; ?></td>
	<td><?php echo $promedio; ?></td>                     
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>