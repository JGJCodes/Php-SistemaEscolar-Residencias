<?php 
    session_start();
    
    if (isset($_SESSION['logged'])=== TRUE) {
	header("Location: admin-inicio.php");
    }
    
    $page_titulo = "Login administrador";
    include("html/header/head.html");
    include("html/header/header-inicio.html");
    
    include("php/login.php");
    
    include ("html/forms/form-login.html");
    
    include("html/footer.html");
?>