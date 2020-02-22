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
<title>LISTA DE CALIFICACIONES DE ALUMNOS</title>
</head>
<body>
<h1>HISTORIAL DE CALIFICACIONES</h1> <br>
<p> <strong> Estudiante: </strong> <?php echo $AlumnoId." ".$AlumnoNombre; ?> </p>
<p> <strong> Grupo: </strong> <?php echo $GrupoId." ".$GrupoNombre; ?> </p>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
   <tr>
    <td><strong>CLAVE DE ASIGNATURA</strong></td>
	<td><strong>NOMBRE DE ASIGNATURA</strong></td>
    <td><strong>PRIMER PARCIAL</strong></td>
    <td><strong>SEGUNDO PARCIAL</strong></td>
    <td><strong>TERCER PARCIAL</strong></td>
    <td><strong>FINAL</strong></td>
  </tr>
  
<?PHP
require('../modelo/Database.php');
$sql=mysqli_query($dbc,"select * from calificaciones inner join asignaturas on calificaciones.id_asignatura=asignaturas.id_asignatura where id_estudiante='$AlumnoId'");
$promedio=0; $registros = mysqli_num_rows($sql);
while($res=mysqli_fetch_array($sql)){		

	$codigo=$res["id_asignatura"];
	$asig = $res["titulo"];
	$parcial1=$res["primer_parcial"];
	$parcial2=$res["segundo_parcial"];
	$parcial3=$res["tercer_parcial"];
	$final=$res["cal_final"];
	$promedio = $promedio + $final;
?>  
 <tr>
	<td><?php echo $codigo; ?></td>
	<td><?php echo $asig; ?> </td>
	<td><?php echo $parcial1; ?></td>
	<td><?php echo $parcial2; ?></td>
	<td><?php echo $parcial3; ?></td>
	<td><?php echo $final; ?></td>
 </tr> 
  <?php
}
mysqli_free_result($sql);
mysqli_close($dbc);
$promedio = $promedio / $registros;

require('../modelo/Database.php');
    $q = "UPDATE estudiantes SET promedio_escolar='$promedio' WHERE id_estudiante='$AlumnoId'";
    $r = mysqli_query($dbc, $q);
    mysqli_close($dbc);
  ?>
</table>

<p> <strong> Promedio: </strong> <?php echo $promedio; ?> </p>
</body>
</html>