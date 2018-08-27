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
  $thumb_id = get_post_thumbnail_id($post->ID);
  $url = wp_get_attachment_image_url( $thumb_id, 'thumbnail');

  $client = get_post_meta($post->ID, 'client', true);
  $video = get_post_meta($post->ID, 'youtube', true);
  if($client != "") {
    $client_text = $language == 'en-US' ? 'Client: '.$client : 'Cliente: '.$client;
  } else {
    $client_text = "";
  }

  $postID = pll_get_post($post->ID, 'pt_BR');

  // Get all images from post
  $images = get_posts( array(
    'post_type' => 'attachment',
    'numberposts' => -1,
    'post_status' => null,
    'lang' => '',
    'post_parent' => $postID,
    'exclude' => $thumb_id,
    'orderby' => 'menu_order',
    'order'=>'DESC'
  ));

  $images_arr = array();
  if ($images) {
    foreach ($images as $image) {
      $image_data = wp_get_attachment_image_src( $image->ID, 'thumbnail' );
      if(is_array($image_data)) {
        array_push($images_arr, $image_data[0]);
      }
    }
  }
  if(count($images_arr) == 0) {
    array_push($images_arr, $url);
  }
?>

  <div <?php post_class('portfolio-thumb'); ?> data-id="id-<?=$post->ID;?>">
    <a class="thumb-link" href="<?php the_permalink();?>" title="<?php the_title();?>" data-images="<?=join(';', $images_arr)?>" class="iframe-single" style="background-image: url(<?=$url?>);" data-title="Job: <?php the_title();?>" data-client="<?=$client_text?>" data-video="<?=$video?>" data-playurl="<?=get_bloginfo('template_directory')?>/images/play-bt.png">
      <p class="description">
        Job: <?php the_title();?>
        <?php if($client != ""): ?>
          <br><?=$client_text?>
        <?php endif; ?>
      </p>
    </a>
  </div>
<?php endwhile; // End the loop. Whew. ?>