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
    

    $page_titulo = "Administrar calificaciones de alumnos";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    $page_subtitulo = $GrupoNombre.": Calificaciones";
    $linkagregar = "form-calif.php";
    $linkpdf = "php/reportes/reporte-cal-pdf.php";
    $linkword = "php/reportes/reporte-cal-word.php";
    $linkexcel = "php/reportes/reporte-cal-excel.php";
    include("html/main/main-titulo.html");
    
    if($codError!=""){
	echo $codError;
    }
    
    $fila1 = "Identificador";
    $fila2 = "Clave de alumno";
    $fila3 = "Calificación final";
    $tabla = "calificaciones";
    $tbf1 = "id_calificacion";
    $tbf2 = "id_estudiante";
    $tbf3 = "cal_final";
    $query = "id";
    $llave = "id_grupo";
    $Id = $GrupoId;
    $btnBorrar = "borrar-registro.php";
    $btnEditar = "form-calif.php";
    include("html/main/main-tabla.html");
    
    include("html/footer.html");
?>