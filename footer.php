<?php global $language;?>
    </div><!-- //#main -->
  </div>
</div>
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-md-offset-1">
        <?php if($language == 'en-US'):?><h4>Pages</h4>
        <?php else:?><h4>Páginas</h4><?php endif;?>
        <?php wp_nav_menu( array( 'menu_class' => 'bottom-menu', 'theme_location' => 'top_menu', 'container' => 'ul') ); ?>
      </div>
      <?php $my_query = new WP_Query('showposts=1&post_type=footer_info'); ?>
      <?php if($my_query->have_posts()) : ?><?php while($my_query->have_posts()) : $my_query->the_post(); ?>
      <div class="col-md-3">
        <h4><?php the_title();?></h4>
        <?php the_content();?>
      </div>
      <div class="col-md-3 copyright">
        <h4>Cria Ideias - <?php echo date('Y');?></h4>
        <?php if($language == 'en-US'):?><p>all rights reserved. <br/>developed by cria ideias.</p>
        <?php elseif($language == 'es-ES'):?><p>todos los derechos reservados. <br/>desarrollado por cria ideias.</p>
        <?php else:?><p>todos os direitos reservados. <br/>desenvolvido por cria ideias.</p><?php endif;?>
        <img src="<?php echo get_bloginfo('template_directory'); ?>/images/logo_copy.png" alt="Cria Ideias" id="copy_logo" />
      </div>
      <?php endwhile; endif; wp_reset_query(); ?>
    </div>
  </div>
</footer><!-- //footer -->
<aside id="gallery">
  <div class="gallery-container">
    <div class="gallery-center">
      <img src="<?=get_bloginfo('template_directory')?>/images/loading.gif" class="gallery-image" />
      <div class="gallery-player" style="display: none;"></div>
      <div class="gallery-footer">
        <div class="gallery-description"></div>
        <ul class="gallery-thumbs"></ul>
      </div>
    </div>
  </div>
</aside>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/cria_general.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/cria_parallax.js"></script>
<?php	wp_footer(); ?>
</body>
</html>