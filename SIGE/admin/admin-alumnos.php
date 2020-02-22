<?php 
    include("php/sesion.php");

    $page_titulo = "Administrar alumnos";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    $page_subtitulo = "Alumnos";
    $linkagregar = "form-usuarios.php";
    $linkpdf = "php/reportes/reporte-alum-pdf.php";
    $linkword = "php/reportes/reporte-alum-word.php";
    $linkexcel = "php/reportes/reporte-alum-excel.php";
    include("html/main/main-titulo.html");
    
    $fila1 = "Identificador";
    $fila2 = "Nombre de usuario";
    $fila3 = "Tipo de usuario";
    $tabla = "usuarios";
    $query = "id";
    $llave = "tipo";
    $Id = "'estudiante'";
    $tbf1 = "id_usuario";
    $tbf2 = "nombre";
    $tbf3 = "tipo";
    
    $btnBorrar = "borrar-registro.php";
    $btnEditar = "form-usuarios.php";
     $btnextra1 = true;
    $btnext1href = "form-alumno.php";
    $btnext1label = "datos escolares";
     $btnextra2 = true;
    $btnext2href = "form-ficha.php";
    $btnext2label = "ficha medica";
     $btnextra3 = true;
    $btnext3href = "php/reportes/historial-cal-alumno.php";
    $btnext3label = "historial de calificaciones";
    $btnextra4 = true;
    $btnext4href = "php/reportes/historial-asistencia-alumno.php";
    $btnext4label = "historial de asistencias";

    include("html/main/main-tabla.html");
    
    include("html/footer.html");
?>

