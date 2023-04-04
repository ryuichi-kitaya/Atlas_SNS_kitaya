$(function(){
    $('.accordion').click(function(){
      $(this).next().slideToggle();
    });
  });