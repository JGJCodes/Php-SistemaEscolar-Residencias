<?php 
    include("php/sesion.php");
    
    include("php/validaciones/val-asigmast.php");
    
    $page_titulo = "Formulario de asignatura con maestros";
    include("html/header/head.html");
    include("html/header/header-usuario.html"); 

    include("html/forms/form-asigmast.html");
    
    include("html/footer.html");
    
?>