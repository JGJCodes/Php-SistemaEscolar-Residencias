<?php 
    $codError = "";
    
    $formTitulo = "Registrar"; 
    $formId = "";
    $formFecha = "";
    $formPeso = "";
    $formEstatura = "";
    $formPad = "";
    $formAlerg = "";
    $formMed = "";
    $formTel = "";
    $formSangre = "";
    $formClave = "";
    $formInst = "";
    $formMedico = "";
    
    if(!empty($_GET['id'])){ //Verifica si existe el usuario
    
        $id = $_REQUEST['id'];
	$fecha = "";
	$peso = "";
	$estatura = "";
	$pad = "";
	$alerg = "";
	$med = "";
	$tel = "";
	$sangre = "";
	$inst = "";
	$medico = "";
	$clave = "";
	
	$formId = $id;
	
	require('php/modelo/Database.php');
	$q = "SELECT * FROM estudiantes WHERE id_estudiante='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      if($registro["id_usuario"]==""){  header("Location: admin-alumnos.php");}
            }
            
            mysqli_free_result($r);   
         mysqli_close($dbc);
         
         require('php/modelo/Database.php');
	$q = "SELECT * FROM ficha_medica WHERE id_estudiante='$id'";
	$r = mysqli_query($dbc, $q); $reg = mysqli_num_rows($r);
         if($reg==0){ 
         
         $formTitulo = "Registrar"; 
         
         }else{
         $formTitulo = "Actualizar";
         while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $clave =  $registro["id_ficha"];
	      $fecha =  $registro["fecha_actualizacion"];
	      $peso = $registro["peso"];
	      $estatura = $registro["estatura"];
	      $pad = $registro["padecimiento_medico"];
	      $alerg = $registro["alergias"];
	      $med = $registro["medicamentos"];
	      $tel = $registro["medico_tel"];
	      $sangre = $registro["grupo_sanguineo"];
	      $inst = $registro["institucion_medica"];
	      $medico = $registro["medico_nombre"];
         }
         
         //muestra los datos del usuario en el formulario
            
             $formFecha = $fecha;
	     $formPeso = $peso;
	     $formEstatura = $estatura;
	     $formPad = $pad;
	     $formAlerg =  $alerg;
	     $formMed = $med;
	     $formTel = $tel;
	     $formSangre = $sangre;
	     $formClave = $clave;
	     $formInst = $inst;
	     $formMedico = $medico;
         }
         
            
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
	$peso = trim($_POST["formPeso"]);
	$estatura = trim($_POST["formEstatura"]);
	$pad = trim($_POST["formPad"]);
	$alerg = trim($_POST["formAlerg"]);
	$med = trim($_POST["formMed"]);
	$tel = trim($_POST["formTel"]);
	$sangre = trim($_POST["formSangre"]);
	$inst = trim($_POST["formInst"]);
	$medico = trim($_POST["formMedico"]);
	$clave = trim($_POST["formClave"]);

        $errores = array(); 
	
	//comprobacion de los datos ingresados
        if($peso==""  or $alerg=="" or $med=="" or $medico=="" or $tel==""){ 
            $errores[] = "Debes ingresar el peso, alergias, medicamentos, medico y telefono del doctor."; 
        }
        

        if(empty($errores)){  //verificacion si existen errores en el formulario
	    require('php/modelo/Database.php');
            
	    if($formTitulo == "Registrar"){//Registro de usuario
	      $formTitulo = "Registrar"; 
	      
	      $q = "INSERT INTO ficha_medica(id_estudiante,peso,estatura,padecimiento_medico," ;
	      $q .= "alergias,medicamentos,grupo_sanguineo,fecha_actualizacion,institucion_medica,";
	      $q .= "medico_nombre,medico_tel) ";
	      $q .= "VALUES ('$id', '$peso', '$estatura', '$pad', '$alerg'";
	      $q .= ", '$med', '$sangre', NOW(), '$inst', '$medico'";
	      $q .= ", '$tel')";
	     echo $q;
	      $r = mysqli_query($dbc, $q);
            
	      if($r){//si la operacion se realizo correctamente
                
               header("Location: admin-alumnos.php");
		
	      }else{
		$codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
		$codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
	      header("Location: error.php");
		  }
            } else{ //Actualizacion de datos
	      $formTitulo = "Actualizar"; 
	      
	      $q = "UPDATE ficha_medica SET peso='$peso', estatura='$estatura', padecimiento_medico='$pad', ";
	      $q .= "alergias='$alerg', medicamentos='$med', grupo_sanguineo='$sangre', fecha_actualizacion=NOW(), ";
	      $q .= "institucion_medica='$inst', medico_nombre='$medico', medico_tel='$tel' ";
	      $q .= "WHERE id_ficha='$clave'";
        
	      $r = mysqli_query($dbc, $q);
            
	      if($r){//si la operacion se realizo correctamente
		
                mysqli_free_result($r);
                header("Location: admin-alumnos.php");
                
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