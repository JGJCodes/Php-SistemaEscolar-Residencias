<?php

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Ficha.doc");
		

    $codError = "";
    $id = "";
    $nombre = ""; 
    $paterno = ""; 
    $materno = "";
    $curp = "";
    $genero = "";
    $fecha = "";
    $telefono = "";
    $direccion = "";
    $email = "";
    $escuela = "";
    $promedio = "";
    $reg = "";
    $padre = "";
    $madre = "";
    $grado ="";

    if(!empty($_GET['id'])){ //Verifica si existe el registro
    
        $id = $_REQUEST['id'];
	
	require('../modelo/Database.php');
	$q = "SELECT * FROM aspirantes WHERE id_aspirante='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $nombre = $registro["nombres"]; 
	      $paterno = $registro["apellido_paterno"];
	      $materno = $registro["apellido_materno"];
	      $curp = $registro["curp"];
	      $genero = $registro["genero"];
	      $fecha = $registro["fecha_nacimiento"];
	      $telefono = $registro["telefono"];
	      $direccion = $registro["direccion"];
	      $email = $registro["email"];
	      $escuela = $registro["escuela_procedencia"];
	      $promedio = $registro["promedio_procedencia"];
	      $reg = $registro["fecha_registro"];
	      $padre = $registro["nombre_padre"];
	      $madre = $registro["nombre_madre"];
	      $grado = $registro["grado"]; 
            }
            
            mysqli_free_result($r);
            
        }
        else{
	    
            $codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
            $codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
        }      
         mysqli_close($dbc);
	
    }

    
    if($codError!=""){
	echo $codError;
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FICHA DE INSCRIPCION DE ASPIRANTE</title>
</head>
<body>
<h1>FICHA DE INSCRIPCION </h1> 
<p> <strong> CICLO ESCOLAR: </strong> AAAA - AAAA </p> 
<p> <strong> Número de ficha: </strong> 000<?php echo $id; ?> </p>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
   <tr>
    <td><strong>FOTO</strong></td>
    <td><strong>DATOS PERSONALES</strong></td>
    <td><strong>DATOS ESCOLARES</strong></td>
  </tr>
 <tr>
	<td> 	</td>
	<td><p> <strong> Nombre: </strong> <?php echo $nombre; ?> <br>
	     <strong> Apellido paterno: </strong> <?php echo $paterno; ?> <br>
	     <strong> Apellido materno: </strong> <?php echo $materno; ?> <br>
	    <strong> CURP: </strong> <?php echo $curp; ?> <br>
	     <strong> Genero: </strong> <?php switch($genero){ case "M":echo "Masculino";break; case "F":echo "Femenino";break; case "O":echo "Otro";break; }?> </p> 
	     <strong> Fecha de nacimiento: </strong> <?php echo $fecha; ?> <br>
	     <strong> Domicilio: </strong> <?php echo $direccion; ?> <br>
	     <strong> Teléfono: </strong> <?php echo $telefono; ?> <br>
	    <strong> Email: </strong> <?php echo $email; ?> </p>
	</td> 
	<td><p> <strong> Escuela de procedencia: </strong> <?php echo $escuela; ?> </p> <br>
	    <p> <strong> Promedio escolar: </strong> <?php echo $promedio; ?> </p> <br>
	    <p> <strong> Grado escolar al que aspira: </strong> <?php echo $grado; ?> </p>
	</td>
 </tr> 
 
</table>

<p> <strong> Fecha y hora de expedición: </strong> <?php echo date("j/n/Y")." ". date("h:i:s"); ?> </p>
</body>
</html>