<?php

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Historial.doc");
		

    $codError = "";
    $AlumnoId = "";
    $AlumnoNombre = "";
    $GrupoId = "";
    $GrupoNombre = "";

    if(!empty($_GET['id'])){ //Verifica si existe el registro
    
        $id = $_REQUEST['id'];
        $titulo = ""; $grupo = "";
	
	require('../modelo/Database.php');
	$q = "SELECT * FROM estudiantes WHERE id_estudiante='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $titulo = $registro["nombres"]." ".$registro["apellido_paterno"]." ".$registro["apellido_materno"];
	      $grupo = $registro["id_grupo"];
            }
            
            //muestra los datos del usuario en el formulario
            $AlumnoId = $id;
            $AlumnoNombre = $titulo;
            
            mysqli_free_result($r);
            
        }
        else{
	    
            $codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
            $codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
        }      
         mysqli_close($dbc);
         
         require('../modelo/Database.php');
	$q = "SELECT * FROM grupos WHERE id_grupo='$grupo'";
	$r = mysqli_query($dbc, $q);
	
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $GrupoId = $registro["id_grupo"];
	      $GrupoNombre = $registro["etiqueta"]; 
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
<title>HISTORIAL DE ASISTENCIAS POR ALUMNO</title>
</head>
<body>
<h1>HISTORIAL DE ASISTENCIAS </h1> <br>
<p> <strong> Estudiante: </strong> <?php echo $AlumnoId." ".$AlumnoNombre; ?> </p>
<p> <strong> Grupo: </strong> <?php echo $GrupoId." ".$GrupoNombre; ?> </p>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
   <tr>
    <td><strong>CLAVE DE ASIGNATURA</strong></td>
	<td><strong>NOMBRE DE ASIGNATURA</strong></td>
    <td><strong>FECHA DEL DIA</strong></td>
    <td><strong>ASISTENCIA</strong></td>
  </tr>
  
<?PHP $faltas = 0; $asistencias=0; $retardos = 0;
require('../modelo/Database.php');
$sql=mysqli_query($dbc,"select * from asistencias inner join asignaturas on asistencias.id_asignatura=asignaturas.id_asignatura where id_estudiante='$AlumnoId' order by fecha");
while($res=mysqli_fetch_array($sql)){		
	$codigo=$res["id_asignatura"];
	$nombre=$res["fecha"];
	$asig = $res["titulo"];
	$promedio=$res["asist"];
	switch($promedio){
	    case "presente": $asistencias += 1; break;
	    case "retardo": $retardos += 1; break;
	    case "falta": $faltas += 1; break;
	}
?>  
 <tr>
	<td><?php echo $codigo; ?></td>
	<td><?php echo $asig; ?> </td>
	<td><?php echo $nombre; ?></td>
	<td><?php echo $promedio; ?></td>                
 </tr> 
  <?php
}
mysqli_close($dbc);

  ?>
</table>

<p> <strong> Asistencias: </strong> <?php echo $asistencias; ?>    <strong> Retardos: </strong> <?php echo $retardos; ?>  <strong> Faltas: </strong> <?php echo $faltas; ?> </p>
</body>
</html>