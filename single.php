<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:fb="http://ogp.me/ns/fb#">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title><?php wp_title();?></title>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=219864628064327";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div class="aligncenter" <?php post_class(); ?> id="post-container">
		<div class="fb-like" data-href="<?php the_permalink();?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
		<?php the_content(); ?>
		<fb:comments href="<?php the_permalink();?>" num_posts="10" width="550"></fb:comments>
	</div><!--//post-->
</body>
<?php endwhile; // end of the loop. ?>
</html>