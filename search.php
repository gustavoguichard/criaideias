<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

	<div class="grid_12">
	<?php if ( have_posts() ) : ?>
  	<h3>Resultados da busca por: <?php echo get_search_query(); ?></h3>
		<ol>
		<?php get_template_part( 'loop', 'search' ); ?>
		</ol>
		<?php else : ?>
		<h3>Nada encontrado</h3>
		<p>Desculpe, mas esta página não existe ou não pode ser encontrada. Tente <a href="<?php echo bloginfo('url');?>">voltar para a Home</a> e começar de novo…</p>
		<?php endif; ?>
  </div>
	<div class="grid_12">		
		<?php if(function_exists('wp_paginate')) { wp_paginate(); } ?>
	</div><!--//grid-12-->
<?php get_footer(); ?>