$(function() {
  var options = {};
  var loadingUrl = $('.gallery-image', '#gallery').attr('src');
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
    $collapsible.toggleClass('expanded');
    event.preventDefault();
  });

  function openGallery(info) {
    var $gallery = $('#gallery').fadeIn();
    var $description = $('.gallery-description', $gallery);
    var $thumbs = $('.gallery-thumbs', $gallery);
    var images = info.images.split(';').reverse();

    var desc = info.client ? info.title + '<br>' + info.client : info.title;
    $description.html(desc);

    var imagesHtml = images.map(function(img) {
      return '<li><img src="' + img + '" class="gallery-thumbnail" /></li>';
    });
    $thumbs.html(imagesHtml);

    changeGalleryImg(images[0]);
  }

  function changeGalleryImg(image) {
    var $image = $('.gallery-image', '#gallery');
    var fullImg = image.replace('-150x150.', '.');
    $image.attr('src', loadingUrl);
    $.get(fullImg).done(function() { $image.attr('src', fullImg); });
  }

  $(document).on('click', '.gallery-thumbnail', function(event) {
    var $target = $(event.currentTarget);
    var url = $target.attr('src');
    changeGalleryImg(url);
  });

  $(document).on('click', '.thumb-link', function(event) {
    var $target = $(event.currentTarget);
    var info = $target.data();
    openGallery(info);
    event.preventDefault();
  });

  $('#gallery').on('click', function(event) {
    if($(event.target).hasClass('gallery-container')) {
      $(event.currentTarget).fadeOut();
    }
  });

});