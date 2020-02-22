<?php 
    $codError = "";
    
    $formTitulo = "Registrar"; 
    $formId = "";
    $formNombre = "";
    $formPaterno = "";
    $formMaterno = "";
    $formCurp = "";
    $formRfc = "";
    $formTel = "";
    $formDir = "";
    $formEmail = "";
    $formGrado = "";
    $formTutor = "";
    $formOcupacion = "";
    $formFecha = "";
    $formGenero = "";
    
    if(!empty($_GET['id'])){ //Verifica si existe el usuario
    
        $id = $_REQUEST['id'];
	$nombre = ""; 
	$paterno = ""; 
	$materno = "";
	$curp = "";
	$rfc = "";
	$telefono = "";
	$direccion = "";
	$email = "";
	$grado = "";
	$tutor = "";
	$ocupacion = "";
	$fecha = "";
	$genero = "";
	
	$formId = $id;
	
	require('php/modelo/Database.php');
	$q = "SELECT * FROM padres WHERE id_padre='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	$formTitulo = "Actualizar"; 
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $nombre = $registro["nombres"];
	      $paterno = $registro["apellido_paterno"];
	      $materno = $registro["apellido_materno"];
	      $curp = $registro["curp"];
	      $rfc = $registro["rfc"];
	      $telefono = $registro["telefono"];
	      $direccion = $registro["direccion"];
	      $email = $registro["email"];
	      $grado = $registro["grado_estudios"];
	      $tutor = $registro["tutor"];
	      $ocupacion = $registro["ocupacion"];
	      $fecha = $registro["fecha_nacimiento"];
	      $genero = $registro["genero"];
            }
            
            //muestra los datos del usuario en el formulario
            
            $formNombre = $nombre;
            $formPaterno = $paterno;
            $formMaterno = $materno;
            $formCurp = $curp;
            $formRfc = $rfc;
            $formTel = $telefono;
            $formDir = $direccion;
            $formEmail = $email;
            $formGenero = $genero;
	    $formFecha = $fecha;
            $formGrado = $grado;
	    $formTutor = $tutor;
	    $formOcupacion = $ocupacion;
            
            
        }  else{
	    
            $codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
            $codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
			header("Location: error.php");
		}      
        mysqli_free_result($r);   
         mysqli_close($dbc);
	
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){ //verifica si se enviaron datos del formulario
	$id = trim($_POST["formId"]); 
        $nombre = trim($_POST["formNombre"]);
	$paterno = trim($_POST["formPaterno"]);
	$materno = trim($_POST["formMaterno"]);
	$curp = trim($_POST["formCurp"]);
	$rfc = trim($_POST["formRfc"]);
	$telefono = trim($_POST["formTel"]);
	$direccion = trim($_POST["formDir"]);
	$email = trim($_POST["formEmail"]);
	$grado = trim($_POST["formGrado"]);
	$genero = trim($_POST["formGenero"]);
	$fecha = trim($_POST["formFecha"]);
	$tutor = trim($_POST["formTutor"]);
	$ocupacion = trim($_POST["formOcupacion"]);

        $errores = array(); 
	
	//comprobacion de los datos ingresados
        if($nombre==""  or $paterno=="" or $paterno=="" or $curp=="" or $email=="" or $rfc==""){ 
            $errores[] = "Debes ingresar el nombre completo, curp, rfc, email y nombre de usuario.\n"; 
        }
        
        if(!filter_var($email,FILTER_VALIDATE_EMAIL )){ 
            $errores[] = "El email no es valido"; 
        } 

        if(empty($errores)){  //verificacion si existen errores en el formulario
	    require('php/modelo/Database.php');
	    $curp = strtoupper($curp);
            
	    if($formTitulo == "Registrar"){//Registro de usuario
	      $formTitulo = "Registrar"; 
	      
	      $q = "INSERT INTO padres(nombres,apellido_paterno,apellido_materno,genero,fecha_nacimiento," ;
	      $q .= "curp,rfc,direccion,email,telefono,grado_estudios,ocupacion,tutor) ";
	      $q .= "VALUES ('$nombre', '$paterno', '$materno', '$genero', '$fecha', '$curp', '$rfc',";
	      $q .= " '$direccion', '$email', '$telefono', '$grado', '$ocupacion', '$tutor')";
	     
	      $r = mysqli_query($dbc, $q);
            
	      if($r){//si la operacion se realizo correctamente
	     
                mysqli_free_result($r);
               header("Location: admin-padres.php");
		
	      }else{
		$codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
		$codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
	     header("Location: error.php");
		 }
            } else{ //Actualizacion de datos
	      $formTitulo = "Actualizar"; 
	      
	      $q = "UPDATE padres SET nombres='$nombre', apellido_paterno='$paterno', apellido_materno='$materno', ";
	      $q .= "curp='$curp', rfc='$rfc', direccion='$direccion', email='$email', telefono='$telefono', ";
	      $q .= "grado_estudios='$grado', ocupacion='$ocupacion', tutor='$tutor', genero='$genero', fecha_nacimiento='$fecha'";
	      $q .= "WHERE id_padre='$id'";
        
	      $r = mysqli_query($dbc, $q);
            
	      if($r){//si la operacion se realizo correctamente
		
                mysqli_free_result($r);
                header("Location: admin-padres.php");
                
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