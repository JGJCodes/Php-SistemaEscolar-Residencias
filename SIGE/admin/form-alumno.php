<?php 
    include("php/sesion.php");
    
    include("php/validaciones/val-alumno.php");
    
    $page_titulo = "Formulario de alumnos";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    include ("html/forms/form-alumno.html");
    
    include("html/footer.html");
    
?>