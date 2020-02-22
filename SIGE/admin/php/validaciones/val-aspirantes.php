<?php 
    $codError = "";
    
    $formTitulo = "Registrar"; 
    $formId = "";
    $formNombre = "";
    $formPaterno = "";
    $formMaterno = "";
    $formCurp = "";
    $formGenero = "";
    $formFecha = "";
    $formTelefono = "";
    $formDir = "";
    $formEmail = "";
    $formEscuela = "";
    $formPromedio = "";
    $formExamen = "";
    $formSolicitud = "";
    $formReg = "";
    $formPadre = "";
    $formMadre = "";
    $formGrado = "";

    if(!empty($_GET['id'])){ //Verifica si existe el usuario
    
        $id = $_REQUEST['id'];
        $nombre = ""; 
	$paterno = ""; 
	$materno = "";
	$curp = "";
	$genero = "";
	$fecha = "";
	$telefono = "";
	$direccion = "";
	$email = "";
	$escuela = "";
	$promedio = "";
	$examen = "";
	$solicitud = "";
	$reg = "";
	$padre = "";
	$madre = "";
	$grado ="";
	
	$formTitulo = "Actualizar";
	
	require('php/modelo/Database.php');
	$q = "SELECT * FROM aspirantes WHERE id_aspirante='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $nombre = $registro["nombres"]; 
	      $paterno = $registro["apellido_paterno"];
	      $materno = $registro["apellido_materno"];
	      $curp = $registro["curp"];
	      $genero = $registro["genero"];
	      $fecha = $registro["fecha_nacimiento"];
	      $telefono = $registro["telefono"];
	      $direccion = $registro["direccion"];
	      $email = $registro["email"];
	      $escuela = $registro["escuela_procedencia"];
	      $promedio = $registro["promedio_procedencia"];
	      $examen = $registro["examen_admision"];
	      $solicitud = $registro["solicitud"];
	      $reg = $registro["fecha_registro"];
	      $padre = $registro["nombre_padre"];
	      $madre = $registro["nombre_madre"];
	      $grado = $registro["grado_aspira"];
            }
            
            //muestra los datos del usuario en el formulario
            $formId = $id;
	    $formNombre =  $nombre; 
	    $formPaterno = $paterno; 
	    $formMaterno = $materno;
	    $formCurp = $curp;
	    $formGenero = $genero;
	    $formFecha = $fecha;
	    $formTelefono = $telefono;
	    $formDir = $direccion;
	    $formEmail = $email;
	    $formEscuela = $escuela;
	    $formPromedio = $promedio;
	    $formExamen = $examen;
	    $formSolicitud = $solicitud;
	    $formReg = $reg;
	    $formGrado = $grado;
	    $formPadre = $padre;
	    $formMadre = $madre;
            
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
        $nombre = trim($_POST["formNombre"]); 
	$paterno = trim($_POST["formPaterno"]); 
	$materno = trim($_POST["formMaterno"]); 
	$curp = trim($_POST["formCurp"]); 
	$genero = trim($_POST["formGenero"]); 
	$fecha = trim($_POST["formFecha"]); 
	$telefono = trim($_POST["formTelefono"]); 
	$direccion = trim($_POST["formDir"]); 
	$email = trim($_POST["formEmail"]);
	$escuela = trim($_POST["formEscuela"]); 
	$promedio = trim($_POST["formPromedio"]); 
	$examen = trim($_POST["formExamen"]); 
	$solicitud = trim($_POST["formSolicitud"]);
	$grado = trim($_POST["formGrado"]); 
	$padre = trim($_POST["formPadre"]); 
	$madre = trim($_POST["formMadre"]);

        $errores = array(); 
	
	//comprobacion de los datos ingresados
        if($telefono == ""  or $email == "" or $nombre == "" or $paterno == "" or $materno == "" or $curp == "" or $escuela == "" or $promedio == ""){ 
            $errores[] = "Es necesario ingresar el nombre completo, teléfono, email, curp y escuela de procedencia\n"; 
        }

        if(!filter_var($email,FILTER_VALIDATE_EMAIL )){ 
            $errores[] = "El email no es valido"; 
        } 
        

        if(empty($errores)){  //verificacion si existen errores en el formulario
	   require('php/modelo/Database.php');
            
           $curp = strtoupper($curp);
            
	    if($id==""){//Registro de usuario
	      $formTitulo = "Registrar"; 
	      
	      $q = "INSERT INTO aspirantes(nombres,apellido_paterno,apellido_materno," ;
	      $q .= "curp,genero,fecha_nacimiento,direccion,telefono,email,promedio_procedencia,escuela_procedencia,";
	      $q .= "examen_admision,solicitud,fecha_registro,grado_aspira,nombre_madre,nombre_padre) VALUES ('$nombre', '$paterno', '$materno', '$curp',";
	      $q .= " '$genero', '$fecha', '$direccion', '$telefono', '$email', '$promedio', '$escuela', '$examen',";
	      $q .= " '$solicitud', NOW(), '$grado', '$madre', '$padre')";
	      
	      $r = mysqli_query($dbc, $q);
            
	      if($r){//si la operacion se realizo correctamente
	       $codError = '<script type="text/javascript"> alert("Registro insertado correctamente"); </script>';
               // mysqli_free_result($r);
               header("Location: admin-aspirantes.php");
		
	      }else{
		$codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
		$codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
	     header("Location: error.php");
		 }
            } else{ //Actualizacion de datos
	      $formTitulo = "Actualizar"; 
	      
	      $q = "UPDATE aspirantes SET grado_aspira='$grado', nombre_padre='$padre', nombre_madre='$madre', nombres='$nombre', apellido_paterno='$paterno', apellido_materno='$materno', curp='$curp', genero='$genero', fecha_nacimiento='$fecha', direccion='$direccion', telefono='$telefono', email='$email', promedio_procedencia='$promedio', escuela_procedencia='$escuela', examen_admision='$examen', solicitud='$solicitud' WHERE id_aspirante='$id'";
        
	      $r = mysqli_query($dbc, $q);
            
	      if($r){//si la operacion se realizo correctamente
		
                mysqli_free_result($r);
                header("Location: admin-aspirantes.php");
                
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