$(function() {

  $('.criador_thumb').on('click', function(e){
    $('.criador_thumb').fadeOut();
    $('.criador_bio', $(this).parent()).slideDown();
  	e.preventDefault();
  });

  $('.criador_bio a.criador_foto, .criador_bio a.close_criador, .criador_bio h3').on('click', function(e){
    $(this).parents('.criador_bio').slideUp();
    $('.criador_thumb').fadeIn();
  	e.preventDefault();
  });

  var $folio_container = $('#folio_container');
  var clone = $folio_container.clone();

  $('ul.tags a').on("click", function(){
		var el = $(this);
		$('ul.tags li').removeClass("active");
		el.closest('li').addClass("active");
		var selected = el.attr('rel');
		var filteredItems;
		if (selected === 'tudo'){
			filteredItems = clone.find('div.post');
		}	else {
			filteredItems = clone.find('div.post.'+selected+'');
		}

		$folio_container.quicksand(filteredItems, {duration: 750, adjustHeight: 'dynamic'});
		return false;
	});

  $('.mobile-menu-link').on('click', function(e) {
    $('body').toggleClass('menu-open');
    e.preventDefault();
  });

	$(".iframe-single").fancybox({
		maxWidth	: 700,
		width     : '100%',
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
		type : 'iframe'
	});
});