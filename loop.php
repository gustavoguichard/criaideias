<?php if ( ! have_posts() ) : ?>
	<div class="post e404 col-xs-12">
		<h3>Nada encontrado</h3>
		<p>Desculpe, mas esta página não existe ou não pode ser encontrada. Tente <a href="<?php echo bloginfo('url');?>">voltar para a Home</a> e começar de novo…</p>
	</div>
<?php endif; ?>

<?php
  global $language;

  while ( have_posts() ) : the_post();
  $terms = get_the_terms( $post->ID, 'post_tag' );
  $url = wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'thumbnail');
  $client = get_post_meta($post->ID, 'client', true);
?>

  <div <?php post_class('portfolio-thumb'); ?> data-id="id-<?=$post->ID;?>">
    <a class="thumb-link fancybox fancybox.iframe" href="<?php the_permalink();?>" title="<?php the_title();?>" class="iframe-single" style="background-image: url(<?=$url?>);">
      <p class="description">
        Job: <?php the_title();?>
        <?php if($client != "") {
          $client_title = $language == 'en-US' ? 'Client' : 'Cliente';
          echo "<br><br>".$client_title.": ".$client;
        }?>
      </p>
		</a>
	</div>
<?php endwhile; // End the loop. Whew. ?>