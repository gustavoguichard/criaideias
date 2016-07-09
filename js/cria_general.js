$(function() {
  var options = {};
  var rootUrl = $('body').data('url');
  options.offset = 1;
  options.tag = $('body').data('tag');

  function objToQuery(obj) {
    return Object.keys(obj).reduce(function(acc, curr) {
      return obj[curr] ? acc + curr + '=' + obj[curr] + '&' : acc;
    }, '?');
  }

  $('.read-more').on('click', function(event) {
    $.get(rootUrl + '/ajax' + objToQuery(options), function(data) {
      if (data.match(/post e404 col-xs-12/g)) {
        $(event.currentTarget).remove();
      } else {
        $('#folio_container').append(data);
        options.offset++;
      }
    });
    event.preventDefault();
  });

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

  $('.collapsible-title, .size-page-thumb', '.collapsible').on('click', function(event) {
    var $collapsible = $(event.currentTarget).closest('.collapsible');
    var $link = $('.expand-link', $collapsible)[0];
    $collapsible.toggleClass('expanded');
    $link.textContent = $link.textContent === '-' ? '+' : '-';
    event.preventDefault();
  });

});