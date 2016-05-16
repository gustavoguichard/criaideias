<?php if ( ! have_posts() ) : ?>
	<div class="post e404 col-xs-12">
		<h3>Nada encontrado</h3>
		<p>Desculpe, mas esta página não existe ou não pode ser encontrada. Tente <a href="<?php echo bloginfo('url');?>">voltar para a Home</a> e começar de novo…</p>
	</div>
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php $terms = get_the_terms( $post->ID, 'post_tag' );?>
<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
	<div <?php post_class('col-md-4 col-sm-6'); ?> data-id="id-<?=$post->ID;?>">
		<a class="thumb-link" href="<?php the_permalink();?>" title="<?php the_title();?>" class="iframe-single"  data-fancybox-type="iframe" style="background-image: url(<?=$url?>);">
			<span><?php the_title();?></span>
		</a>
	</div>
<?php endwhile; // End the loop. Whew. ?>