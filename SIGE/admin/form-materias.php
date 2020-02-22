<?php 
    include("php/sesion.php");
    
    include("php/validaciones/val-materias.php");
    
    $page_titulo = "Formulario de asignaturas escolares";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    include ("html/forms/form-materias.html");
    
    include("html/footer.html");
    
?>