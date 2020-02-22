<?php
  $codError = "";
    
    $formTitulo = "Registrar"; 
    $formId = "";
    $formGrupo = "";
    $formAlumno = "";
    $formAsig = "";
    $formFecha = "";
    $formAsist = "";
    
    if(!empty($_GET['id'])){ //Verifica si existe el registro
    
        $id = $_REQUEST['id'];
        $grupo = ""; 
        $alumno = ""; 
        $fecha = "";
        $asist= ""; 
        $asig = "";
	
	$formTitulo = "Actualizar";
	
	require('php/modelo/Database.php');
	$q = "SELECT * FROM asistencias WHERE id_asistencia='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $grupo = $registro["id_grupo"]; 
	      $alumno = $registro["id_estudiante"]; 
	      $fecha = $registro["fecha"]; 
	      $asist = $registro["asist"]; 
	      $asig = $registro["id_asignatura"];
            }
            
            //muestra los datos del usuario en el formulario
            $formId = $id;
            $formGrupo = $grupo;
            $formAlumno = $alumno;
            $formFecha = $fecha;
            $formAsist = $asist;
            $formAsig = $asig;
            
            mysqli_free_result($r);
            
        }
        else{
	    header("Location: error.php");
            $codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
            $codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
        }      
         mysqli_close($dbc);
	
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){ //verifica si se enviaron datos del formulario
	$id = trim($_POST["formId"]);  
        $grupo = trim($_POST["formGrupo"]); 
        $alumno = trim($_POST["formAlumno"]); 
	$fecha = trim($_POST["formFecha"]);
	$asist = trim($_POST["formAsist"]);
        $asig = trim($_POST["formAsig"]);
        
        $errores = array(); 
	
	//comprobacion de los datos ingresados
        if($fecha == "" or $grupo=="" or $alumno=="" or $asig==""){ 
            $errores[] = "Debes completar todos los campos"; 
        }

        if(empty($errores)){  //verificacion si existen errores en el formulario
	    
	    require('php/modelo/Database.php');
	    
	    if($id==""){//Registro de usuario
	      $formTitulo = "Registrar";
	      
	      $q = "INSERT INTO asistencias(id_estudiante,id_grupo,id_asignatura,fecha,asist) ";
	      $q .= " VALUES ( '$alumno', '$grupo', '$asig', '$fecha', '$asist')";
	      
	      $r = mysqli_query($dbc, $q);
            
	      if($r){//si la operacion se realizo correctamente
	      
                mysqli_free_result($r);
               header("Location: admin-grupos.php");
		
	      }else{
		$codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
		$codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
	      header("Location: error.php");
		  }
            } else{ //Actualizacion de datos
	      $formTitulo = "Actualizar"; 
	      
	      $q = "UPDATE asistencias SET asist='$asist' WHERE id_asistencia='$id'";
        
	      $r = mysqli_query($dbc, $q);
            
	      if($r){//si la operacion se realizo correctamente
		
                mysqli_free_result($r);
                header("Location: admin-grupos.php");
                
	      }else{
		$codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
		$codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
		header("Location: error.php");
	      }
	 	 	
	 }	
	
	 mysqli_close($dbc);
	 exit();
            
        }
        else{ 
	   $mensaje="";
            foreach($errores as	$msg){	
		$mensaje.="-".$msg;
            }
            $codError = '<script type="text/javascript"> alert("Errores: '.$mensaje.' .Por favor vuelve a intentarlo."); </script>';
        }   
      
    };


?> 