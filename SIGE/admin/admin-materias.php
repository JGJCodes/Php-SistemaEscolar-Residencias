<?php 
    include("php/sesion.php");

    $page_titulo = "Administrar asignaturas escolares";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    $page_subtitulo = "Asignaturas escolares";
    $linkagregar = "form-materias.php";
    $linkpdf = "php/reportes/reporte-asig-pdf.php";
    $linkword = "php/reportes/reporte-asig-word.php";
    $linkexcel = "php/reportes/reporte-asig-excel.php";
    include("html/main/main-titulo.html");
    
    $fila1 = "Identificador";
    $fila2 = "Titulo";
    $fila3 = "Programa escolar";
    $tabla = "asignaturas";
    $tbf1 = "id_asignatura";
    $tbf2 = "titulo";
    $tbf3 = "descripcion";
    $btnBorrar = "borrar-registro.php";
    $btnEditar = "form-materias.php";
    
    $btnextra1 = true;
    $btnext1href = "admin-unidades.php";
    $btnext1label = "unidades";
    $btnextra2 = true;
    $btnext2href = "admin-asig-maestro.php";
    $btnext2label = "maestros";
    $btnextra3 = true;
    $btnext3href = "php/reportes/programa-asig.php";
    $btnext3label = "programa de estudios";
    include("html/main/main-tabla.html");
    
    include("html/footer.html");
?>