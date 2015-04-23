$(function (){

    $("#dropdown-menu1").on('click', 'li a', function(){
      $(".btn-city:first-child").text($(this).text());
      $(".btn-city:first-child").val($(this).text());
   });
    $("#dropdown-menu2").on('click', 'li a', function(){
      $(".btn-locality:first-child").text($(this).text());
      $(".btn-locality:first-child").val($(this).text());
   });
    
});


$(".infoabout i").css({opacity:5});

$('#registerbtn').on('click' , function() { 
  $.modal.close();
});