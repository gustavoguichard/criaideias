<?php
/**
 * Template Name: Animações Page
 *
 * @package WordPress
 * @subpackage Cria Ideias
 * @since Gustavo Guichard 2012
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <div class="row">
    <?php the_post_thumbnail('page-thumb');?>
    <div class="col-xs-12">
      <?php the_content();?>
    </div>
  </div>
  <div class="row">
    <?php $my_query = new WP_Query('showposts=-1&post_type=animation&orderby=menu_order&order=ASC'); ?>
    <?php if($my_query->have_posts()) : ?><?php while($my_query->have_posts()) : $my_query->the_post(); ?>
      <?php $left_margin = get_post_meta($post->ID, 'left_margin', true);?>
      <section class="col-xs-12 collapsible collapsible-lg">
        <?php the_post_thumbnail('page-thumb'); ?>
        <header class="section-title">
          <h2 class="collapsible-title"><?php the_title();?></h2>
          <span class="expand-link"></span>
        </header>
        <div class="collapsible-content">
          <?php the_content();?>
        </div>
      </section>
    <?php endwhile; endif; wp_reset_query(); ?>
  </div>
<?php endwhile; ?>
<?php get_footer(); ?>