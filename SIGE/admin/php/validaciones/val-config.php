<?php 
    $codError = "";
    
    $formTitulo = "Registrar";
    $formId = "";
    $formNombre = "";
    $formDesc = "";
    
    require('php/modelo/Database.php');
	$q = "SELECT * FROM sistema WHERE id='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $nombre = $registro["nombre"]; 
	      $desc = $registro["descripcion"]; 
            }
            
            //muestra los datos del usuario en el formulario
            $formId = $id;
            $formNombre = $nombre;
            $formDesc = $desc;
            
            mysqli_free_result($r);
            
        }
        else{
			header("Location: error.php");
            $codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
            $codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
        }      
         mysqli_close($dbc);
         

    if($_SERVER['REQUEST_METHOD'] == 'POST'){ //verifica si se enviaron datos del formulario
	$id = trim($_POST["formId"]); 
        $nombre= trim($_POST['nombre']);
	$descripcion= trim($_POST['desc']);
	$imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
	
	require('php/modelo/Database.php');
	
	$q = "UPDATE sistema SET nombre='$nombre', descripcion='$descripcion', imagen='$imagen' WHERE id='$id'";
        
	      $r = mysqli_query($dbc, $q);
            
	      if($r){//si la operacion se realizo correctamente
		
                mysqli_free_result($r);
                header("Location: admin-inicio.php");
                
	      }else{
		$codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
		$codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
		header("Location: error.php");
	      }
	
	 mysqli_close($dbc);
	 exit();
            
        }
     
?> 