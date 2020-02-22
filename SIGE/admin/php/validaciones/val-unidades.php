<?php 
    $codError = "";
    
    $formTitulo = "Registrar"; 
    $formId = "";
    $formTema = "";
    $formDesc = "";
    $formAsig = "";
    
    if(!empty($_GET['id'])){ //Verifica si existe el registro
    
        $id = $_REQUEST['id'];
        $tema = ""; 
        $desc = ""; 
	$asignatura = ""; 
	  
	$formTitulo = "Actualizar";
	
	require('php/modelo/Database.php');
	$q = "SELECT * FROM unidades WHERE id_unidad='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $tema = $registro["tema"]; 
	      $desc = $registro["descripcion"]; 
	      $asignatura = $registro["id_asignatura"]; 
            }
            
            //muestra los datos del usuario en el formulario
            $formId = $id;
            $formTema = $tema;
            $formDesc = $desc;
            $formAsig = $asignatura;
            
            mysqli_free_result($r);
            
        }
        else{
	    
            $codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
            $codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
			header("Location: error.php");
		}      
         mysqli_close($dbc);
	
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){ //verifica si se enviaron datos del formulario
	$id = trim($_POST["formId"]); 
        $titulo = trim($_POST["formTema"]); 
        $desc = trim($_POST["formDesc"]); 
        $asignatura = trim($_POST["formAsig"]); 

        $errores = array(); 
	
	//comprobacion de los datos ingresados
        if($titulo == "" or $desc==""){ 
            $errores[] = "Debes completar todos los campos"; 
        }

        if(empty($errores)){  //verificacion si existen errores en el formulario
	    require('php/modelo/Database.php');
            
	    if($id==""){//Registro de usuario
	      $formTitulo = "Registrar"; 
	      
	      $q = "INSERT INTO unidades(tema,descripcion,id_asignatura) VALUES ('$titulo', '$desc', '$asignatura')";
        
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
	      
	      $q = "UPDATE unidades SET tema='$titulo', descripcion='$desc' WHERE id_unidad='$id'";
        
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