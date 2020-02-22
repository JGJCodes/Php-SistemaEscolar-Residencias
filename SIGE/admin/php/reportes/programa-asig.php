<?php

  require_once("../dompdf/dompdf_config.inc.php");
  require('../modelo/Database.php');

    $codError = "";
    $AsigId = "";
    $AsigNombre = "";
    $AsigProg = "";

    if(!empty($_GET['id'])){ //Verifica si existe el registro
    
        $id = $_REQUEST['id'];

	$q = "SELECT * FROM asignaturas WHERE id_asignatura='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $AsigNombre = $registro["titulo"];
	      $AsigProg = $registro["descripcion"];
            }
           
            $AsigId = $id;
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

$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es-mx" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" />
<meta charset="UTF-8">
<title>Documento sin título</title>
</head>
<body>
<h1>PROGRAMA DE ESTUDIOS</h1>
<p> <strong> Asignatura: </strong> '.$AsigNombre.' </p>
<p> <strong> Descripcion: </strong> '.$AsigProg.' </p>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<caption><strong>UNIDADES</strong></caption>
   <tr>
    <th><strong>CLAVE</strong></th>
    <th><strong>TEMA</strong></th>
    <th><strong>DESCRIPCION</strong></th>
  </tr>';
  
require('../modelo/Database.php');
$sql=mysqli_query($dbc,"SELECT * FROM unidades WHERE id_asignatura='$AsigId'");
while($res=mysqli_fetch_array($sql)){
$codigoHTML.='	
	<tr>
		<td>'.$res['id_unidad'].'</td>
		<td>'.$res['tema'].'</td>
		<td>'.$res['descripcion'].'</td>										
	</tr>';
	
}
mysqli_free_result($res);
$codigoHTML.='
</table>
</body>
</html>';
$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Programa.pdf");
?>