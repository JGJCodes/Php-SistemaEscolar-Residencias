<?php

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Reporte.doc");
require('../modelo/Database.php');		


?>
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
  </tr>
  
<?PHP
		
$sql=mysqli_query($dbc,"select * from maestros");
while($res=mysqli_fetch_array($sql)){		

	$codigo=$res["id_maestro"];
	$nombre=$res["nombres"]." ".$res["apellido_paterno"]." ".$res["apellido_materno"];
	$curp=$res["curp"];
	$titulo=$res["titulo"];					
?>  
 <tr>
	<td><?php echo $codigo; ?></td>
	<td><?php echo $nombre; ?></td>
	<td><?php echo $curp; ?></td>
	<td><?php echo $titulo; ?></td>                   
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>