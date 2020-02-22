<?php 
    $codError = "";
    
    $formTitulo = "Registrar";
    $formId = "";
    $formNombre = "";
    $formPrograma = "";

    if(!empty($_GET['id'])){ //Verifica si existe el usuario
    
        $id = $_REQUEST['id'];
        $titulo = ""; 
	$programa = ""; 
	  
	$formTitulo = "Actualizar";
	
	require('php/modelo/Database.php');
	$q = "SELECT * FROM asignaturas WHERE id_asignatura='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $titulo = $registro["titulo"]; 
	      $programa = $registro["descripcion"]; 
            }
            
            //muestra los datos del usuario en el formulario
            $formId = $id;
            $formNombre = $titulo;
            $formPrograma = $programa;
            
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
        $titulo = trim($_POST["formNombre"]); 
        $programa = trim($_POST["formPrograma"]); 

        $errores = array(); 
	
	//comprobacion de los datos ingresados
        if($titulo == ""  or $programa == ""){ 
            $errores[] = "Debes completar todos los campos"; 
        }

        if(empty($errores)){  //verificacion si existen errores en el formulario
	    require('php/modelo/Database.php');
            
	    if($id==""){//Registro de usuario
	      $formTitulo = "Registrar"; 
	      
	      $q = "INSERT INTO asignaturas(titulo,descripcion) VALUES ('$titulo', '$programa')";
        
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
	      
	      $q = "UPDATE asignaturas SET titulo='$titulo', descripcion='$programa' WHERE id_asignatura='$id'";
        
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
      
    }
?> 