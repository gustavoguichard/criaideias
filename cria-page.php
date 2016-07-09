<?php
/**
 * Template Name: Cria Page
 *
 * @package WordPress
 * @subpackage Cria Ideias
 * @since Gustavo Guichard 2012
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php the_post_thumbnail('page-thumb');?>
	<div class="col-md-6">
		<?php the_content();?>
	</div>
	<div class="col-md-6">
		<section class="criadores">
			<?php $my_query = new WP_Query('showposts=-1&post_type=criador&orderby=menu_order&order=ASC'); ?>
			<?php if($my_query->have_posts()) : ?><?php while($my_query->have_posts()) : $my_query->the_post(); ?>
			<article class="criador">
				<?php $left_margin = get_post_meta($post->ID, 'left_margin', true);?>
				<?php $top_margin = get_post_meta($post->ID, 'top_margin', true);?>
				<?php if($top_margin == 0) $top_margin = 1; if($left_margin == 0) $left_margin = 1;?>
				<?php $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'criador-thumb');?>
				<a class="criador_thumb" href="#" title="<?php the_title();?>" style="background-image: url(<?php echo $img[0]; ?>);<?php if($top_margin && $left_margin) echo " background-position: " . $left_margin . "% " . $top_margin . "%;";?>"><?php the_title();?></a>
				<aside class="criador_bio">
					<a class="criador_foto" href="#" title="<?php the_title();?>" style="background-image: url(<?php echo $img[0]; ?>);"><?php the_title();?></a>
					<h3><?php the_title();?></h3>
					<a href="#" class="close_criador">X</a>
					<article><?php the_content();?></article>
				</aside>
			</article>
			<?php endwhile; endif; wp_reset_query(); ?>
		</section>
	</div>
<?php endwhile; ?>
<?php get_footer(); ?>