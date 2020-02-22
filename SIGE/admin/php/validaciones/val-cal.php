<?php
  $codError = "";
    
    $formTitulo = "Registrar"; 
    $formId = "";
    $formGrupo = "";
    $formAlumno = "";
    $formAsig = "";
    $formFecha = "";
    $formParcial1 = "";
    $formParcial2 = "";
    $formParcial3 = "";
    $formFinal ="";
    
    if(!empty($_GET['id'])){ //Verifica si existe el registro
    
        $id = $_REQUEST['id'];
        $grupo = ""; 
        $alumno = ""; 
        $fecha = "";
        $cal = ""; 
	$asignatura = "";
	$parcial1 = "";
	$parcial2 = "";
	$parcial3 = "";
	$final = "";
	
	$formTitulo = "Actualizar";
	
	require('php/modelo/Database.php');
	$q = "SELECT * FROM calificaciones WHERE id_calificacion='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $grupo = $registro["id_grupo"]; 
	      $alumno = $registro["id_estudiante"]; 
	      $fecha = $registro["fecha_limite"]; 
	      $parcial1 = $registro["primer_parcial"]; 
	      $parcial2 = $registro["segundo_parcial"];
	      $parcial3 = $registro["tercer_parcial"];
	      $final = $registro["cal_final"];
	      $asignatura = $registro["id_asignatura"]; 
            }
            
            //muestra los datos del usuario en el formulario
            $formId = $id;
            $formGrupo = $grupo;
            $formAlumno = $alumno;
            $formAsig = $asignatura;
            $formFecha = $fecha;
            $formParcial1 = $parcial1;
            $formParcial2 = $parcial2;
            $formParcial3 = $parcial3;
            $formFinal = $final;
            
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
        $alumno = trim($_POST["formAlumno"]); 
	$parcial1 = trim($_POST["formParcial1"]);
	$parcial2 = trim($_POST["formParcial2"]);
	$parcial3 = trim($_POST["formParcial3"]);
	$dia = trim($_POST["formFecha"]);
        
        
        $errores = array(); 
	
	//comprobacion de los datos ingresados
        if($asig == "" or $grupo=="" or $alumno==""){ 
            $errores[] = "Debes completar todos los campos"; 
        }

        if(empty($errores)){  //verificacion si existen errores en el formulario
	    
	    require('php/modelo/Database.php');
	    
	    if($cal==""){ $cal=0;}
            
	    if($id==""){//Registro de usuario
	      $formTitulo = "Registrar";
	      
	      $q = "INSERT INTO calificaciones(id_estudiante,id_asignatura,id_grupo,fecha_limite,primer_parcial,segundo_parcial,tercer_parcial,cal_final) ";
	      $q .= " VALUES ( '$alumno', '$asig', '$grupo', '$dia', '$cal', '$cal', '$cal', '$cal')";
	      
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
	      
	      $cal = ($parcial1 + $parcial2 + $parcial3) / 3;
	      
	      $q = "UPDATE calificaciones SET primer_parcial='$parcial1', segundo_parcial='$parcial2', tercer_parcial='$parcial3' , cal_final='$cal' WHERE id_calificacion='$id'";
        
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