<?php 
    include("php/sesion.php");
    
    include("php/validaciones/val-padres.php");
    
    $page_titulo = "Formulario de padres";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    include ("html/forms/form-padres.html");
    
    include("html/footer.html");
    
?>