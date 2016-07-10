$(function() {
  var options = {};
  options.offset = 0;
  options.tag = $('body').data('tag');

  function objToQuery(obj) {
    return Object.keys(obj).reduce(function(acc, curr) {
      return obj[curr] ? acc + curr + '=' + obj[curr] + '&' : acc;
    }, '?');
  }

  $('.read-more').on('click', function(event) {
    var $target = $(event.currentTarget);
    var url = $target.attr('href');
    $('body').addClass('reading-more');
    options.offset++;

    $.get(url + objToQuery(options), function(data) {
      $('body').removeClass('reading-more');
      if (data.match(/post e404 col-xs-12/g)) {
        $target.remove();
      } else {
        $('#folio_container').append(data);
      }
    });
    event.preventDefault();
  });

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