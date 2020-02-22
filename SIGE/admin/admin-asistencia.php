<?php 
    include("php/sesion.php");
    
    $codError = "";
    $GrupoId = "";
    $GrupoNombre = "";

    if(!empty($_GET['id'])){ //Verifica si existe el registro
    
        $id = $_REQUEST['id'];
        $titulo = "";
	
	require('php/modelo/Database.php');
	$q = "SELECT * FROM grupos WHERE id_grupo='$id'";
	$r = mysqli_query($dbc, $q);
	  
	if($r){//si hay resultado entonces
	
            while($registro = mysqli_fetch_array($r)){ //recupera los datos del usuario
	      $titulo = $registro["etiqueta"]; 
            }
            
            //muestra los datos del usuario en el formulario
            $GrupoId = $id;
            $GrupoNombre = $titulo;
            
            mysqli_free_result($r);
            
        }
        else{
	    
            $codError = '<p class="text-danger"> Lo sentimos la pagina ha tenido un inconveniente</p> <br />';	
            $codError .= '<p class="text-danger">' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p> <br/ ></main>';
        }      
         mysqli_close($dbc);
	
    }
    

    $page_titulo = "Administrar asistencias de alumnos";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    $page_subtitulo = $GrupoNombre.": Asistencias";
    $linkagregar = "form-asist.php";
    $linkpdf = "php/reportes/reporte-asist-pdf.php";
    $linkword = "php/reportes/reporte-asist-word.php";
    $linkexcel = "php/reportes/reporte-asist-excel.php";
    include("html/main/main-titulo.html");
    
    if($codError!=""){
	echo $codError;
    }
    
    $fila1 = "Identificador";
    $fila2 = "Clave de alumno";
    $fila3 = "Asistencia";
    $tabla = "asistencias";
    $tbf1 = "id_asistencia";
    $tbf2 = "id_estudiante";
    $tbf3 = "asist";
    $query = "id";
    $llave = "id_grupo";
    $Id = $GrupoId;
    $btnBorrar = "borrar-registro.php";
    $btnEditar = "form-asist.php";
    include("html/main/main-tabla.html");
    
    include("html/footer.html");
?>