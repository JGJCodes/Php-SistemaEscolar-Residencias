<?php
  $codError = "";
    
    $formTitulo = "Registrar"; 
    $formId = "";
    $formGrupo = "";
    $formMaestro = "";
    $formAsig = "";
    
    if(!empty($_GET['id'])){ //Verifica si existe el registro
    
        $id = $_REQUEST['id'];
        $grupo = ""; 
        $maestro = ""; 
	$asignatura = ""; 
	  
	$formTitulo = "Actualizar";
	
	require('php/modelo/Database.php');
	$q = "SELECT * FROM asignatura_maestro WHERE id_asignaturaconmaestros='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $grupo = $registro["id_grupo"]; 
	      $maestro = $registro["id_maestro"]; 
	      $asignatura = $registro["id_asignatura"]; 
            }
            
            //muestra los datos del usuario en el formulario
            $formId = $id;
            $formGrupo = $grupo;
            $formMaestro = $maestro;
            $formAsig = $asignatura;
            
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
        $asig = trim($_POST["formAsig"]); 
        $grupo = trim($_POST["formGrupo"]); 
        $maestro = trim($_POST["formMaestro"]); 

        $errores = array(); 
	
	//comprobacion de los datos ingresados
        if($asig == "" or $grupo=="" or $maestro==""){ 
            $errores[] = "Debes completar todos los campos"; 
        }

        if(empty($errores)){  //verificacion si existen errores en el formulario
	    require('php/modelo/Database.php');
            
	    if($id==""){//Registro de usuario
	      $formTitulo = "Registrar"; 
	      
	      $q = "INSERT INTO asignatura_maestro(id_grupo,id_maestro,id_asignatura) VALUES ('$grupo', '$maestro', '$asig')";
        
	      $r = mysqli_query($dbc, $q);
            
	      if($r){//si la operacion se realizo correctamente
	      
                mysqli_free_result($r);
               header("Location: admin-materias.php");
		
	      }else{
		$codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
		$codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
	      header("Location: error.php");
		  }
            } else{ //Actualizacion de datos
	      $formTitulo = "Actualizar"; 
	      
	      $q = "UPDATE asignatura_maestro SET id_grupo='$grupo', id_maestro='$maestro', id_asignatura='$asig' WHERE id_asignaturaconmaestros='$id'";
        
	      $r = mysqli_query($dbc, $q);
            
	      if($r){//si la operacion se realizo correctamente
		
                mysqli_free_result($r);
                header("Location: admin-materias.php");
                
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