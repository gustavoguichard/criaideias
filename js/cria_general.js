$(function() {
  
  $('.criador_thumb').live('click', function(e){
  	e.preventDefault();
  	$('.criador_thumb').fadeOut();
  	$('.criador_bio', $(this).parent()).slideDown();
  });
  
  $('.criador_bio a.criador_foto, .criador_bio a.close_criador, .criador_bio h3').live('click', function(e){
  	e.preventDefault();
  	$(this).parents('.criador_bio').slideUp();
  	$('.criador_thumb').fadeIn();
  });
  
  var $folio_container = $('#folio_container');
  var clone = $folio_container.clone();
  
  $('ul.tags a').live("click", function(){
		el = $(this);
		$('li', el.parents('ul')).removeClass("active");
		el.parent().addClass("active");
		var selected = el.attr('rel');
		var filteredItems;
		if(selected == 'tudo'){
			filteredItems = clone.find('div.post');
		}	else {
			filteredItems = clone.find('div.post.'+selected+'');
		}
		
		$folio_container.quicksand(filteredItems, {duration: 750, adjustHeight: 'dynamic'});
		return false;
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