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
    $formTel = "";
    $formDir = "";
    $formPromedio = "";
    $formEscuela = "";
    $formGrupo = "";
    $formPadre = "";
    $formMadre = "";
    $formGrado = "";
	
    $grupoini = "";
    
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
	$promedio = "";
	$escuela = "";
	$padre = "";
	$madre = "";
	
	$formId = $id;
	
	require('php/modelo/Database.php');
	$q = "SELECT * FROM estudiantes WHERE id_estudiante='$id'";
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
	      $promedio = $registro["promedio_escolar"];
	      $escuela = $registro["escuela_procedencia"];
	      $grupoini = $registro["id_grupo"];
	      $padre = $registro["id_padre"];
	      $madre = $registro["id_madre"];
	      if($registro["id_usuario"]!=""){ $formTitulo = "Actualizar"; }
            }
            
            //muestra los datos del usuario en el formulario
            
            $formNombre = $nombre;
            $formPaterno = $paterno;
            $formMaterno = $materno;
            $formCurp = $curp;
            $formGenero = $genero;
            $formFecha = $fecha;
            $formTel = $telefono;
            $formDir = $direccion;
            $formPromedio = $promedio;
            $formEscuela = $escuela;
            $formGrupo = $grupoini;
            $formPadre = $padre;
            $formMadre = $madre;
            
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
	$genero = trim($_POST["formGenero"]);
	$fecha = trim($_POST["formFecha"]);
	$telefono = trim($_POST["formTel"]);
	$direccion = trim($_POST["formDir"]);
	$promedio = trim($_POST["formPromedio"]);
	$escuela = trim($_POST["formEscuela"]);
	$padre = trim($_POST["formPadre"]);
	$madre = trim($_POST["formMadre"]);
	$grupo = trim($_POST["formGrupo"]);

        $errores = array(); 
	
	//comprobacion de los datos ingresados
        if($nombre==""  or $paterno=="" or $paterno=="" or $curp=="" ){ 
            $errores[] = "Debes ingresar el nombre completo, curp y email."; 
        }
        
        if(empty($errores)){  //verificacion si existen errores en el formulario
	    require('php/modelo/Database.php');
	    $curp = strtoupper($curp);
	     if($promedio==""){$promedio=0;}
            
	    if($formTitulo == "Registrar"){//Registro de usuario
	      $formTitulo = "Registrar"; 
	      
	      $q = "INSERT INTO estudiantes(id_estudiante,nombres,apellido_paterno,apellido_materno," ;
	      $q .= "curp,genero,promedio_escolar,escuela_procedencia,direccion,fecha_nacimiento,";
	      $q .= "telefono,id_usuario,id_grupo,id_padre,id_madre) ";
	      $q .= "VALUES ('$id', '$nombre', '$paterno', '$materno', '$curp'";
	      $q .= ", '$genero', '$promedio', '$escuela', '$direccion', '$fecha'";
	      $q .= ", '$telefono', '$id', '$grupo', '$padre', '$madre')";
	     
	      $r = mysqli_query($dbc, $q);
            
	      if($r){//si la operacion se realizo correctamente
	     
                mysqli_free_result($r);
                mysqli_close($dbc);
                
                require('php/modelo/Database.php');
		$q = "SELECT * FROM grupos WHERE id_grupo='$grupo'";
		$r = mysqli_query($dbc, $q);
		while($registro = mysqli_fetch_array($r)){
		  $alumnos = $registro["alumnos_registrados"];
                }
                mysqli_free_result($r);
                mysqli_close($dbc);
                $alumnos = $alumnos + 1;
                
                require('php/modelo/Database.php');//Agregar alumno al grupo
		$q = "UPDATE grupos SET alumnos_registrados='$alumnos' WHERE id_grupo='$grupo'";
		$r = mysqli_query($dbc, $q);
                
               header("Location: admin-alumnos.php");
		
	      }else{
		$codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
		$codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
	     header("Location: error.php");
		 }
            } else{ //Actualizacion de datos
	      $formTitulo = "Actualizar"; 
	      
	      $q = "UPDATE estudiantes SET nombres='$nombre', apellido_paterno='$paterno', apellido_materno='$materno', ";
	      $q .= "curp='$curp', genero='$genero', promedio_escolar='$promedio', escuela_procedencia='$escuela', direccion='$direccion', ";
	      $q .= "fecha_nacimiento='$fecha', telefono='$telefono', id_grupo='$grupo', id_padre='$padre', id_madre='$madre' ";
	      $q .= "WHERE id_estudiante='$id'";
        
	      $r = mysqli_query($dbc, $q);
            
	      if($r){//si la operacion se realizo correctamente
		mysqli_free_result($r);
		  mysqli_close($dbc);
		
		if( $grupo!=$grupoini){
		  
                require('php/modelo/Database.php');//Agregar al alumno al grupo
		$q = "SELECT * FROM grupos WHERE id_grupo='$grupo'";
		$r = mysqli_query($dbc, $q);
		while($registro = mysqli_fetch_array($r)){
		  $alums = $registro["alumnos_registrados"];
                }
                mysqli_free_result($r);
                mysqli_close($dbc);
                $alums = $alums + 1;
                
                //Cambio de grupo del alumno
                require('php/modelo/Database.php');
		$q = "UPDATE grupos SET alumnos_registrados='$alums' WHERE id_grupo='$grupo'";
		$r = mysqli_query($dbc, $q);
		mysqli_free_result($r);
                mysqli_close($dbc);
                
                require('php/modelo/Database.php');
		$q = "SELECT * FROM grupos WHERE id_grupo='$grupoini'";
		$r = mysqli_query($dbc, $q);
		while($registro = mysqli_fetch_array($r)){
		  $alum = $registro["alumnos_registrados"];
                }
                mysqli_free_result($r);
                mysqli_close($dbc);
                $alum = $alum - 1;
                
                require('php/modelo/Database.php');
		$q = "UPDATE grupos SET alumnos_registrados='$alum' WHERE id_grupo='$grupoini'";
		$r = mysqli_query($dbc, $q);
		mysqli_free_result($r);
                mysqli_close($dbc);
		
		}
		
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