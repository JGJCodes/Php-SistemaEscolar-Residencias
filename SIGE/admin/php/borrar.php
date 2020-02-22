<?php 
     $codError = "";

   if(!empty($_GET['id'])){ //Verifica si existe el usuario
    $getId = $_REQUEST['id'];
    $getTabla = $_REQUEST['tabla'];
    
    require('php/modelo/Database.php');
    
    switch($getTabla){

      case "usuarios":$formId=$getId; $formLlave='id_usuario';
		      $formTabla=$getTabla; 
		      $q = "SELECT tipo FROM ".$getTabla." WHERE id_usuario=".$getId;
		      $res = mysqli_query($dbc, $q);
		      $reg = mysqli_fetch_array($res);
		      switch ($reg["tipo"]) {
		      	case "estudiante": $formPagina='admin-alumnos.php';break;
		      	case "maestro": $formPagina='admin-maestros.php';break;
		      	case "admin": $formPagina='admin-administrativos.php';break;
		      }break;
      
      case "aspirantes":$formId=$getId; $formLlave='id_aspirante';
			$formTabla=$getTabla; $formPagina='admin-aspirantes.php'; break;
      
      case "grupos":$formId=$getId; $formLlave='id_grupo';
		    $formTabla=$getTabla; $formPagina='admin-grupos.php'; break;
      
      case "asignaturas":$formId=$getId; $formLlave='id_asignatura';
			 $formTabla=$getTabla; $formPagina='admin-materias.php'; break;
      
      case "calificaciones":$formId=$getId; $formLlave='id_calificacion';
			    $formTabla=$getTabla; $formPagina='admin-grupos.php'; break;
      
      case "padres":$formId=$getId; $formLlave='id_padre';
		      $formTabla=$getTabla; $formPagina='admin-padres.php'; break;
      
      case "unidades":$formId=$getId; $formLlave='id_unidad';
		      $formTabla=$getTabla; $formPagina='admin-materias.php'; break;
      
      case "asignatura_maestro":$formId=$getId; $formLlave='id_asignaturaconmaestros';
				$formTabla=$getTabla; $formPagina='admin-materias.php'; break;
      
      case "asistencias":$formId=$getId; $formLlave='id_asistencia';
			$formTabla=$getTabla; $formPagina='admin-grupos.php'; break;
    }
    
    mysqli_close($dbc);
             
  }
  
   if($_SERVER['REQUEST_METHOD'] == 'POST'){ //verifica si se enviaron datos del formulario
    $id = trim($_POST["formId"]); 
    $llave = trim($_POST["formLlave"]); 
    $tabla = trim($_POST["formTabla"]);
    $page = trim($_POST["formPagina"]);
    
    if($page=='admin-alumnos.php'){
    
    require('php/modelo/Database.php');
    $q = "SELECT * FROM estudiantes WHERE id_estudiante='$id'";
    $r = mysqli_query($dbc, $q);
    while($registro = mysqli_fetch_array($r)){
	$grupo = $registro["id_grupo"];
    }
    mysqli_free_result($r);
    mysqli_close($dbc);
    
    }
    
    require('php/modelo/Database.php');
    
    $q = "DELETE FROM ".$tabla." WHERE ".$llave."=".$id;
    $res = mysqli_query($dbc, $q);
    
    if($res){
      mysqli_free_result($r);
                mysqli_close($dbc);
                
      if($page=='admin-alumnos.php'){
		require('php/modelo/Database.php');
		$q = "SELECT * FROM grupos WHERE id_grupo='$grupo'";
		$r = mysqli_query($dbc, $q);
		while($registro = mysqli_fetch_array($r)){
		  $alumnos = $registro["alumnos_registrados"];
		}
                mysqli_free_result($r);
                mysqli_close($dbc);
                $alumnos = $alumnos - 1;
                
                require('php/modelo/Database.php');
		$q = "UPDATE grupos SET alumnos_registrados='$alumnos' WHERE id_grupo='$grupo'";
		$r = mysqli_query($dbc, $q);
      
      }
    
      header('Location: '.$page);
       
    }else{
      $codError = '<p> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
      $codError.= '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
 header("Location: error.php");
    }
                
    mysqli_close($dbc);
  }
?>