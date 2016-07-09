$(function() {

  $(".fancybox").fancybox();

  $('.criador_thumb').on('click', function(event){
    $('.criador_thumb').hide();
    $('.criador_bio', $(this).parent()).fadeIn();
    event.preventDefault();
  });

  $('.criador_bio a.criador_foto, .criador_bio a.close_criador, .criador_bio h3').on('click', function(event){
    $(this).parents('.criador_bio').hide();
    $('.criador_thumb').fadeIn();
    event.preventDefault();
  });


  $('.mobile-menu-link').on('click', function(event) {
    $('body').toggleClass('menu-open');
    event.preventDefault();
  });

  $('.menu-shadow').on('click', function() {
    $('body').removeClass('menu-open');
  });

  $('.tags-select').on('change', function(event) {
    window.location.href = event.currentTarget.value;
  });

});