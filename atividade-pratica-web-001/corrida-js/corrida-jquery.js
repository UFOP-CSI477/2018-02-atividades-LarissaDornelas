
$(document).ready(function(){

  console.log("Documento carregado.");


$("#iniciar").click(function(){
$("#apuracao").toggle("slow");
$(this).addClass("disabled");
$("html, body").animate({
                   scrollTop: $("#apuracao").offset().top
              }, 800);
});

$("#ok").click(function(){
$(this).addClass("disabled");
$("html, body").animate({
                   scrollTop: $("#tableinputs").offset().top
              }, 800);
});

$("#apurar").click(function(){
$(this).addClass("disabled");
$("html, body").animate({
                   scrollTop: $("#tableinputs").offset().top
              }, 1300);
});



});
