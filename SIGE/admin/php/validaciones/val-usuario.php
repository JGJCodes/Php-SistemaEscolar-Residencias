<?php 
    $codError = "";
    
    $formTitulo = "Registrar";
    $formId = "";
    $formNombre = "";
    $formEstatus = "";
    $formTipo = "";
    $formEmail = "";

    if(!empty($_GET['id'])){ //Verifica si existe el usuario
    
        $id = $_REQUEST['id'];
        $usuario = ""; 
	$estatus = ""; 
	$tipo = "";
	$email = "";
	  
	$formTitulo = "Actualizar";
	
	require('php/modelo/Database.php');
	$q = "SELECT * FROM usuarios WHERE id_usuario='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $usuario = $registro["nombre"]; 
	      $estatus = $registro["estatus"]; 
	      $tipo = $registro["tipo"];
	      $email = $registro["email"];
            }
            
            //muestra los datos del usuario en el formulario
            $formId = $id;
            $formNombre = $usuario;
            $formEstatus = $estatus;
            $formTipo = $tipo;
            $formEmail = $email;
            
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
        $usuario = trim($_POST["formNombre"]); 
        $estatus = trim($_POST["formEstatus"]); 
        $tipo = trim($_POST["formTipo"]);
        $pass1 = trim($_POST["formPass1"]); 
        $pass2 = trim($_POST["formPass2"]);
        $email = trim($_POST["formEmail"]);

        $errores = array(); 
	
	//comprobacion de los datos ingresados
        if($usuario == ""  or $estatus == "" or $tipo == "" or $pass1 == "" or $pass2 == ""){ 
            $errores[] = "Debes completar todos los campos\n"; 
        }

        if($pass1 != $pass2){ 
            $errores[] = "Las contraseñas deben coincidir\n"; 
        } 
        
        if(!filter_var($email,FILTER_VALIDATE_EMAIL )){ 
            $errores[] = "El email no es valido\n"; 
        } 

        if(empty($errores)){  //verificacion si existen errores en el formulario
	    require('php/modelo/Database.php');
            
            $pass = password_hash($pass1, PASSWORD_BCRYPT, ["cost" => '11']);
            
	    if($id==""){//Registro de usuario
	      $formTitulo = "Registrar";
	      
	      if($tipo=="estudiante"){$id = 12000000 + mt_rand(0,999999);}
	      if($tipo=="maestro"){$id = 24000000 + mt_rand(0,999999);}
	      if($tipo=="admin"){$id = 99000000 + mt_rand(0,999999);}
	      
	      $q = "INSERT INTO usuarios(id_usuario,nombre,estatus,tipo,pass,email) VALUES ('$id', '$usuario', '$estatus', '$tipo', '$pass', '$email')";
        
	      $r = mysqli_query($dbc, $q);
            
	      if($r){//si la operacion se realizo correctamente
	      
                mysqli_free_result($r);
                if($tipo=="estudiante"){
		  header("Location: admin-alumnos.php");
                }else{
		  header("Location: admin-maestros.php");
                }
		
	      }else{
		$codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
		$codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
	      header("Location: error.php");
		  }
            } else{ //Actualizacion de datos
	      $formTitulo = "Actualizar"; 
	      
	      $q = "UPDATE usuarios SET nombre='$usuario', estatus='$estatus', pass='$pass', email='$email' WHERE id_usuario='$id'";
        
	      $r = mysqli_query($dbc, $q);
            
	      if($r){//si la operacion se realizo correctamente
		
                mysqli_free_result($r);
                switch ($tipo) {
		  case "estudiante":  header("Location: admin-alumnos.php");break;
		  case "maestro":  header("Location: admin-maestros.php");break;
		  case "admin":  header("Location: admin-administrativos.php");break;
                }
                
                
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