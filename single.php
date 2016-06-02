<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" xmlns:fb="http://ogp.me/ns/fb#">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title><?php wp_title();?></title>
</head>
<body>
<div class="aligncenter" <?php post_class(); ?> id="post-container">
	<?php the_content(); ?>
</div><!--//post-->
</body>
<?php endwhile; // end of the loop. ?>
</html>