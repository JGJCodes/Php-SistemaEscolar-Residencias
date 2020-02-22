<?php 
  
    include("php/sesion.php");

    $page_titulo = "Administrar grupos";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    $page_subtitulo = "Grupos escolares";
    $linkagregar = "form-grupos.php";
    $linkpdf = "php/reportes/reporte-grupos-pdf.php";
    $linkword = "php/reportes/reporte-grupos-word.php";
    $linkexcel = "php/reportes/reporte-grupos-excel.php";
    include("html/main/main-titulo.html");
    
    $fila1 = "Identificador";
    $fila2 = "Etiqueta";
    $fila3 = "Promedio";
    $tabla = "grupos";
    $tbf1 = "id_grupo";
    $tbf2 = "etiqueta";
    $tbf3 = "promedio";
    $btnBorrar = "borrar-registro.php";
    $btnEditar = "form-grupos.php";
    
    $btnextra1 = true;
    $btnext1href = "php/reportes/lista-alumnos-grupo.php";
    $btnext1label = "lista de estudiantes";
    $btnextra2 = true;
    $btnext2href = "admin-calificaciones.php";
    $btnext2label = "calificaciones";
    $btnextra3 = true;
    $btnext3href = "admin-asistencia.php";
    $btnext3label = "asistencias";
    $btnextra4 = true;
    $btnext4href = "#";
    $btnext4label = "horario de clases";
    include("html/main/main-tabla.html");
    
    include("html/footer.html");
?>
