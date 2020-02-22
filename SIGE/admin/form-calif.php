<?php 
    include("php/sesion.php");
    
    include("php/validaciones/val-cal.php");
    
    $page_titulo = "Formulario de calificaciones";
    include("html/header/head.html");
    include("html/header/header-usuario.html"); 

    include("html/forms/form-cal.html");
    
    include("html/footer.html");
    
?>