<?php get_header(); ?>
<?php get_template_part( 'tagslist', 'index' ); ?>

<article id="folio_container">
  <?php query_posts(array($query_string, 'post_type'=>'post', 'orderby'=>'menu_order', 'order'=>'ASC'));?>
  <?php get_template_part( 'loop', 'index' ); ?>
</article>
<?php get_template_part( 'read-more', 'index' ); ?>
<?php get_footer(); ?>