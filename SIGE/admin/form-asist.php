<?php 
    include("php/sesion.php");
    
    include("php/validaciones/val-asist.php");
    
    $page_titulo = "Formulario de asistencia";
    include("html/header/head.html");
    include("html/header/header-usuario.html"); 

    include("html/forms/form-asist.html");
    
    include("html/footer.html");
    
?>