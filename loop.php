<?php if ( ! have_posts() ) : ?>
	<div class="post e404 grid_12">
		<h3>Nada encontrado</h3>
		<p>Desculpe, mas esta página não existe ou não pode ser encontrada. Tente <a href="<?php echo bloginfo('url');?>">voltar para a Home</a> e começar de novo…</p>
	</div>
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php $terms = get_the_terms( $post->ID, 'post_tag' );?>
	<div <?php post_class('grid_3'); ?> data-id="id-<?=$post->ID;?>">
		<a href="<?php the_permalink();?>" title="<?php the_title();?>" class="iframe-single"  data-fancybox-type="iframe">
			<?php the_post_thumbnail();?>
			<span><?php the_title();?></span>
		</a>
	</div>
<?php endwhile; // End the loop. Whew. ?>