$(function() {
  var loadingUrl = $('.gallery-image', '#gallery').attr('src');

  function contains(substring, string) {
    return string.indexOf(substring) !== -1;
  }

  function isVideo(string) {
    return contains('//youtu.be/', string);
  }

  function last(array) {
    var size = array.length;
    return array[size - 1];
  }

  function isFunction(obj) {
    return !!(obj && obj.constructor && obj.call && obj.apply);
  }

  $('.criador_thumb').on('click', function(event){
    $('.criador_thumb').hide();
    $('.criador_bio', $(this).parent()).fadeIn();
    event.preventDefault();
  });

  $('a.criador_foto, a.close_criador, h3', '.criador_bio').on('click', function(event){
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
    var isntEmpty = function(el) { return !!el; };

    var $gallery = $('#gallery').fadeIn();
    var $description = $('.gallery-description', $gallery);
    var $thumbs = $('.gallery-thumbs', $gallery);
    var imagesUnfiltered = [].concat(info.video, info.images.split(';').reverse());
    var images = imagesUnfiltered.filter(isntEmpty);

    var desc = info.client ? info.title + '<br>' + info.client : info.title;
    $description.html(desc);

    var imagesHtml = images.map(function(img) {
      return isVideo(img) ?
        '<li><img src="' + info.playurl + '" data-url="' + img + '" class="gallery-video" /></li>'
        : '<li><img src="' + img + '" class="gallery-thumbnail" /></li>';
    });
    $thumbs.html(imagesHtml);

    changeGalleryImg(images[0]);
  }

  function changeGalleryImg(image) {
    var $image = $('.gallery-image', '#gallery');
    var $video = $('.gallery-player', '#gallery');
    $image.attr('src', loadingUrl);
    $video.html('').hide();
    if(isVideo(image)) {
      var videoId = last(image.split('/'));
      var embedCode = '<iframe width="560" height="290" src="https://www.youtube.com/embed/' + videoId + '" frameborder="0" allowfullscreen></iframe>';
      $video.html(embedCode).show();
    } else {
      var fullImg = image.replace('-150x150.', '.');
      $.get(fullImg).done(function() { $image.attr('src', fullImg); });
    }
  }

  $(document).on('click', '.gallery-thumbnail', function(event) {
    var $target = $(event.currentTarget);
    var url = $target.attr('src');
    changeGalleryImg(url);
  });

  $(document).on('click', '.gallery-video', function(event) {
    var $target = $(event.currentTarget);
    var url = $target.data('url');
    changeGalleryImg(url);
  });

  $(document).on('click', '.thumb-link', function(event) {
    var $target = $(event.currentTarget);
    var info = $target.data();
    openGallery(info);
    event.preventDefault();
  });

  function sendForm() {
    if (typeof ga !== 'undefined' && isFunction(ga)) {
      ga('send', 'event', 'botao', 'clique', 'enviar');
    }
  }

  $(document).on('click', '.wpcf7-submit', sendForm);
  $(document).on('submit', '.wpcf7-form', sendForm);

  $('#gallery').on('click', function(event) {
    if($(event.target).hasClass('gallery-container')) {
      $(event.currentTarget).fadeOut();
    }
  });

});