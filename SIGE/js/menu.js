/*
var btnMenu = document.getElementById('btn-menu');
var nav = document.getElementById('nav');
btnMenu.addEventListener('click', function(){
	nav.classList.toggle('mostrar');
})
*/
$(".submenu").click(function(){
	$(this).children("ul").slideToggle();	
})

$("ul").click(function(p){
	p.stopPropagation();
})

/*
 $(document).ready(function(){
   $(".submenu").click(function(){
    $(this).children("ul").slideToggle();
   })

   $("ul").click(function(p){
    p.stopPropagation();
   });
  })﻿
  */