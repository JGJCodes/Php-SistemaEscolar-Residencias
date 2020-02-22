<?php

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Lista.doc");
		

    $codError = "";
    $GrupoId = "";
    $GrupoNombre = "";

    if(!empty($_GET['id'])){ //Verifica si existe el registro
    
        $id = $_REQUEST['id'];
        $titulo = "";
	
	require('../modelo/Database.php');
	$q = "SELECT * FROM grupos WHERE id_grupo='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $titulo = $registro["etiqueta"]; 
            }
            
            //muestra los datos del usuario en el formulario
            $GrupoId = $id;
            $GrupoNombre = $titulo;
            
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
<title>LISTA DE ALUMNOS</title>
</head>
<body>
<h1>LISTA DE ESTUDIANTES DEL GRUPO: <?php echo $GrupoNombre; ?></h1> <br>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
   <tr>
   <td><strong>NUMERO</strong></td>
    <td><strong>CLAVE DEL ESTUDIANTE</strong></td>
    <td><strong>NOMBRE COMPLETO</strong></td>
    <td><strong>PROMEDIO</strong></td>
  </tr>
  
<?PHP
require('../modelo/Database.php'); $num = 1;
$sql=mysqli_query($dbc,"select * from estudiantes where id_grupo='$GrupoId' order by nombres,apellido_paterno,apellido_materno");
while($res=mysqli_fetch_array($sql)){		
	$codigo=$res["id_estudiante"];
	$nombre=$res["nombres"]." ".$res["apellido_paterno"]." ".$res["apellido_materno"];			
	$promedio=$res["promedio_escolar"];					
?>  
 <tr>
	<td><?php echo $num; ?></td>
	<td><?php echo $codigo; ?></td>
	<td><?php echo $nombre; ?></td>
	<td><?php echo $promedio; ?></td>                
 </tr> 
  <?php $num++;
}
mysqli_close($dbc);
  ?>
</table>
</body>
</html>