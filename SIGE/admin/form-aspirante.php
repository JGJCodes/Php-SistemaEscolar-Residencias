<?php 
    include("php/sesion.php");
    
    include("php/validaciones/val-aspirantes.php");
    
    $page_titulo = "Formulario de aspirantes";
    include("html/header/head.html");
    include("html/header/header-usuario.html");
    
    include ("html/forms/form-aspirante.html");
    
    include("html/footer.html");
    
?>