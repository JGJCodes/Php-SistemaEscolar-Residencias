<?php 
    $codError = "";
    
    $formTitulo = "Registrar"; 
    $formId = "";
    $formNombre = "";
    $formPaterno = "";
    $formMaterno = "";
    $formCurp = "";
    $formRfc = "";
    $formSat = "";
    $formImss = "";
    $formGenero = "";
    $formFecha = "";
    $formTel = "";
    $formDir = "";
    $formTit = "";
    $formEscuela = "";
    
    if(!empty($_GET['id'])){ //Verifica si existe el usuario
    
        $id = $_REQUEST['id'];
	$nombre = ""; 
	$paterno = ""; 
	$materno = "";
	$curp = "";
	$rfc = "";
	$sat = "";
	$imss = "";
	$genero = "";
	$fecha = "";
	$telefono = "";
	$direccion = "";
	$titulo = "";
	$escuela = "";
	
	$formId = $id;
	
	require('php/modelo/Database.php');
	$q = "SELECT * FROM maestros WHERE id_maestro='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $nombre = $registro["nombres"];
	      $paterno = $registro["apellido_paterno"];
	      $materno = $registro["apellido_materno"];
	      $curp = $registro["curp"];
	      $rfc = $registro["rfc"];
	      $sat = $registro["sat"];
	      $imss = $registro["imss"];
	      $genero = $registro["genero"];
	      $fecha = $registro["fecha_nacimiento"];
	      $telefono = $registro["telefono"];
	      $direccion = $registro["direccion"];
	      $titulo = $registro["titulo"];
	      $escuela = $registro["escuela_titulo"];
	      if($registro["id_usuario"]!=""){ $formTitulo = "Actualizar"; }
            }
            
            //muestra los datos del usuario en el formulario
            
            $formNombre = $nombre;
            $formPaterno = $paterno;
            $formMaterno = $materno;
            $formCurp = $curp;
            $formRfc = $rfc;
            $formSat = $sat;
            $formImss = $imss;
            $formGenero = $genero;
            $formFecha = $fecha;
            $formTel = $telefono;
            $formDir = $direccion;
            $formTit = $titulo;
            $formEscuela = $escuela;
            
            
        }  else{
	    header("Location: error.php");
            $codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
            $codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
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
	$sat = trim($_POST["formSat"]);
	$imss = trim($_POST["formImss"]);
	$genero = trim($_POST["formGenero"]);
	$fecha = trim($_POST["formFecha"]);
	$telefono = trim($_POST["formTel"]);
	$direccion = trim($_POST["formDir"]);
	$titulo = trim($_POST["formTit"]);
	$escuela = trim($_POST["formEscuela"]);

        $errores = array(); 
	
	//comprobacion de los datos ingresados
        if($nombre==""  or $paterno=="" or $paterno=="" or $curp=="" or $imss=="" or $sat=="" or $rfc==""){ 
            $errores[] = "Debes ingresar el nombre completo, curp, imss, sat, rfc y nombre de usuario."; 
        }
        
        if(empty($errores)){  //verificacion si existen errores en el formulario
	    require('php/modelo/Database.php');
	    $curp = strtoupper($curp);
            
	    if($formTitulo == "Registrar"){//Registro de usuario
	      $formTitulo = "Registrar"; 
	      
	      $q = "INSERT INTO maestros(id_maestro,nombres,apellido_paterno,apellido_materno," ;
	      $q .= "curp,rfc,genero,imss,titulo,escuela_titulo,direccion,fecha_nacimiento,";
	      $q .= "telefono,id_usuario,sat) ";
	      $q .= "VALUES ('$id', '$nombre', '$paterno', '$materno', '$curp'";
	      $q .= ", '$rfc', '$genero', '$imss', '$titulo', '$escuela', '$direccion', '$fecha'";
	      $q .= ", '$telefono', '$id', '$sat')";
	     
	      $r = mysqli_query($dbc, $q);
            
	      if($r){//si la operacion se realizo correctamente
	     
                mysqli_free_result($r);
               header("Location: admin-maestros.php");
		
	      }else{
		$codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
		$codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
	      header("Location: error.php");
		  }
            } else{ //Actualizacion de datos
	      $formTitulo = "Actualizar"; 
	      
	      $q = "UPDATE maestros SET nombres='$nombre', apellido_paterno='$paterno', apellido_materno='$materno', ";
	      $q .= "curp='$curp', rfc='$rfc', genero='$genero', imss='$imss', titulo='$titulo', direccion='$direccion', ";
	      $q .= "fecha_nacimiento='$fecha', telefono='$telefono', sat='$sat' ";
	      $q .= "WHERE id_maestro='$id'";
        
	      $r = mysqli_query($dbc, $q);
            
	      if($r){//si la operacion se realizo correctamente
		
                mysqli_free_result($r);
                header("Location: admin-maestros.php");
                
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