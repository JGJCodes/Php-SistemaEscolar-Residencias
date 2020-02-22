<?php 
    $codError = "";
    
    $formTitulo = "Registrar"; 
    $formId = "";
    $formNombre = "";
    $formTurno = "";
    $formCapacidad = "";
    $formPromedio = "";
    $formSalon = "";
    $formGrado = "";
    $formAlumnos = "";

    if(!empty($_GET['id'])){ //Verifica si existe el usuario
    
        $id = $_REQUEST['id'];
        $etiqueta = ""; 
	$turno = ""; 
	$capacidad = "";
	$promedio = "";
	$salon = "";
	$grado = "";
	$alumnos="";
	
	$formTitulo = "Actualizar";
	
	require('php/modelo/Database.php');
	$q = "SELECT * FROM grupos WHERE id_grupo='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $etiqueta = $registro["etiqueta"]; 
	      $turno = $registro["turno"]; 
	      $capacidad = $registro["capacidad"];
	      $promedio = $registro["promedio"];
	      $salon = $registro["salon"];
	      $grado = $registro["grado_escolar"];
	      $alumnos = $registro["alumnos_registrados"];
            }
            
            //muestra los datos del usuario en el formulario
            $formId = $id;
            $formNombre = $etiqueta;
            $formTurno = $turno;
            $formCapacidad = $capacidad;
            $formPromedio = $promedio;
            $formSalon = $salon;
            $formGrado = $grado;
            $formAlumnos = $alumnos;
            
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
        $etiqueta = trim($_POST["formNombre"]);  
	$turno = trim($_POST["formTurno"]);  
	$capacidad = trim($_POST["formCapacidad"]); 
	$promedio = trim($_POST["formPromedio"]); 
	$salon = trim($_POST["formSalon"]);
	$grado = trim($_POST["formGrado"]);
	
        $errores = array(); 
	
	//comprobacion de los datos ingresados
        if($etiqueta == ""  or $turno == "" or $capacidad == "" ){ 
            $errores[] = "Debes completar todos los campos"; 
        }

        if(empty($errores)){  //verificacion si existen errores en el formulario
	    require('php/modelo/Database.php');
	    if($promedio==""){$promedio=0;}
            
	    if($id==""){//Registro de usuario
	      $formTitulo = "Registrar"; $alumnos=0;
	      
	      $q = "INSERT INTO grupos(etiqueta,turno,capacidad,promedio,salon,grado,alumnos_registrados) VALUES ('$etiqueta', '$turno', '$capacidad', '$promedio', '$salon', '$grado', '$alumnos')";
        
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
	      
	      $q = "UPDATE grupos SET etiqueta='$etiqueta', turno='$turno', capacidad='$capacidad', promedio='$promedio', salon='$salon', grado_escolar='$grado' WHERE id_grupo='$id'";
        
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
      
    }
?> 